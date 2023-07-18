<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\TestimonialSubmission;
use App\Mail\SendTestimonialSubmission;

class TestimonialSubmissionsController extends Controller {

    public function execute(Request $request) {

        $params = $request->all();

        for ($i = 1; $i <= 3; $i++) {
            if (isset($params['photo'.$i])) {
                $path = $this->savePhoto($request, $request->{'photo'.$i}, $i);
                $params['photo'.$i] = $path;
            } else {
                $params['photo'.$i] = '';
            }
        }

        // Save a new lead
        $advocate = new TestimonialSubmission();
        $advocate->fill($params);
        $advocate->save();

        Mail::to('liza.guikema@csuglobal.edu')
            ->cc('lia.bensley@csuglobal.edu')
            ->bcc('enoch.fredericks@csuglobal.edu')
            ->send(new SendTestimonialSubmission(json_encode($params)));

        return redirect('/testimonial-submission/thank-you');

    }

    public function savePhoto($request, $photo, $num) {

        $mimeType = $photo->getMimeType();
        
        if ($mimeType == 'image/jpeg') {
            $ext = '.jpg';
        } else if ($mimeType == 'image/png') {
            $ext = '.png';
        } else if ($mimeType == 'image/gif') {
            $ext = '.gif';
        }

        return $photo->storeAs('testimonials/'.str_replace('@csuglobal.edu', '', $request->email_csug), 'photo'.$num.'_'.$request->first_name.'_'.$request->last_name.$ext);

    }

}
