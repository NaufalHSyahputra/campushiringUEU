<?php
namespace App\Http\Traits;

use Auth;
use DB;
use Mail;
use App\Mail\billinvoicepartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tblregistration;
use App\Model\TblregList;
use App\Model\TblpartnerBill;
use App\Model\TblpartnerBillDetil;
use App\Model\TblschemaFee;
use App\Model\Tblpartner;

trait GenerateBillTraits {
    public function generatePartnerBilling($schemaID, $noReg, $isfromPeserta) {
        $partner_id = Auth::user()->partner_id;
        $schema_id = $schemaID;
        $postfix_number = printf("%04d", rand(0,999));
        $partner_bill_id = hexdec(uniqid()).$postfix_number;
        $pesertanew = 0;
        $pesertarenew = 0;
        $pesertasurveilance = 0;
        $subtotalnew = 0;
        $subtotalrenew = 0;
        $subtotalsurveilance = 0;
        $totalnew = 0;
        $totalrenew = 0;
        $totalsurveilance = 0;
        $discamountnew = 0;
        $discamountrenew = 0;
        $discamountsurveilance = 0;

        if ($isfromPeserta == false){
            /* Get Total Peserta Berdasarkan Status Sertifikasi */
            foreach($noReg as $no_reg)
            {
                $is_new = Tblregistration::find($no_reg)->is_new;
                $is_renew = Tblregistration::find($no_reg)->is_renew;
                $is_surveilance = Tblregistration::find($no_reg)->is_surveilance;
                if ($is_new == 1){
                    $pesertanew++;
                }else if ($is_renew == 1){
                    $pesertarenew++;
                }else if ($is_surveilance == 1){
                    $pesertasurveilance++;
                }
            }
        }
        else {
            foreach($noReg as $no_reg => $val)
            {
                $is_new = Tblregistration::find($no_reg)->is_new;
                $is_renew = Tblregistration::find($no_reg)->is_renew;
                $is_surveilance = Tblregistration::find($no_reg)->is_surveilance;
                if ($is_new == 1){
                    $pesertanew++;
                }else if ($is_renew == 1){
                    $pesertarenew++;
                }else if ($is_surveilance == 1){
                    $pesertasurveilance++;
                }
            }
        }

        /*Insert Partner Bill */
        $partnerbill = new TblpartnerBill();
        $partnerbill->partner_bill_id = $partner_bill_id;
        $partnerbill->partner_id = $partner_id;
        $partnerbill->schema_id = $schema_id;
        $partnerbill->bill_date = Date('Y-m-d');
        $partnerbill->bill_status = 'O';
        $partnerbill->save();

        /* Kalkulasi Harga + Insert Partner Bill Detil*/
        if ($pesertanew > 0){
            /* Ambil Harga Skema status New */
            $harga = TblschemaFee::where([['schema_id', '=', $schema_id], ['fee_type_id', '=', 'N']])->first()->price;
            $subtotalnew = $harga * $pesertanew;
            $discpercent = Tblpartner::find($partner_id)->tblpartner_type->disc_percent;
            $discamountnew = $subtotalnew * $discpercent;
            $totalnew = $subtotalnew - $discamountnew;
            $billdetil = new TblpartnerBillDetil();
            $billdetil->partner_bill_id = $partner_bill_id;
            $billdetil->bill_desc = "Buat Baru";
            $billdetil->qty = $pesertanew;
            $billdetil->price = $harga;
            $billdetil->disc_percent = $discpercent;
            $billdetil->disc_amount = $discamountnew;
            $billdetil->total = $totalnew;
            $billdetil->save();
        }
        if ($pesertarenew > 0){
            /* Ambil Harga Skema status ReNew */
            $harga = TblschemaFee::where([['schema_id', '=', $schema_id], ['fee_type_id', '=', 'R']])->first()->price;
            $subtotalrenew = $harga * $pesertarenew;
            $discpercent = Tblpartner::find($partner_id)->tblpartner_type->disc_percent;
            $discamountrenew = $subtotalrenew * $discpercent;
            $totalrenew = $subtotalrenew - $discamountrenew;
            $billdetil = new TblpartnerBillDetil();
            $billdetil->partner_bill_id = $partner_bill_id;
            $billdetil->bill_desc = "Perpanjang";
            $billdetil->qty = $pesertarenew;
            $billdetil->price = $harga;
            $billdetil->disc_percent = $discpercent;
            $billdetil->disc_amount = $discamountrenew;
            $billdetil->total = $totalrenew;
            $billdetil->save();
        }
        if ($pesertasurveilance > 0){
            /* Ambil Harga Skema status Surveilance */
            $harga = TblschemaFee::where([['schema_id', '=', $schema_id], ['fee_type_id', '=', 'S']])->first()->price;
            $subtotalsurveilance = $harga * $pesertasurveilance;
            $discpercent = Tblpartner::find($partner_id)->tblpartner_type->disc_percent;
            $discamountsurveilance = $subtotalsurveilance * $discpercent;
            $totalsurveilance = $subtotalsurveilance - $discamountsurveilance;
            $billdetil = new TblpartnerBillDetil();
            $billdetil->partner_bill_id = $partner_bill_id;
            $billdetil->bill_desc = "Pemeliharaan";
            $billdetil->qty = $pesertasurveilance;
            $billdetil->price = $harga;
            $billdetil->disc_percent = $discpercent;
            $billdetil->disc_amount = $discamountsurveilance;
            $billdetil->total = $totalsurveilance;
            $billdetil->save();
        }

        /*Update Summary Harga */
        $partnerbilll = TblpartnerBill::find($partner_bill_id);
        $partnerbilll->bill_amount = $subtotalnew + $subtotalrenew + $subtotalsurveilance;
        $partnerbilll->disc_amount = $discamountnew + $discamountrenew + $discamountsurveilance;
        $partnerbilll->sub_total = $totalnew + $totalrenew + $totalsurveilance;
        $partnerbilll->grand_total = $totalnew + $totalrenew + $totalsurveilance; //temporary, karena vat nya belum paham
        $partnerbill->bill_paid = 0;
        $partnerbill->bill_balance = $totalnew + $totalrenew + $totalsurveilance;
        $partnerbilll->save();

        if ($isfromPeserta == false) {
            /*Update partner_bill_id di table registration */
            foreach($noReg as $noreg){
                $registration = Tblregistration::find($noreg);
                $registration->is_billed_to_partner = 1;
                $registration->partner_bill_id = $partner_bill_id;
                $registration->save();
            }
        }
        else {
            /*Update partner_bill_id di table registration */
            foreach($noReg as $noreg => $vala){
                $registration = Tblregistration::find($noreg);
                $registration->is_billed_to_partner = 1;
                $registration->partner_bill_id = $partner_bill_id;
                $registration->save();
            }
        }

        /*Get Email & Send Email*/
        $email = Tblpartner::find($partner_id)->partner_email;
        $partnerbillfix = TblpartnerBill::find($partner_bill_id);
        $partnerbilldetilfix = TblpartnerBillDetil::where('partner_bill_id', $partner_bill_id)->get();
        Mail::to($email)->send(new billinvoicepartner($partnerbillfix, $partnerbilldetilfix)); 

        return true;
    }
}