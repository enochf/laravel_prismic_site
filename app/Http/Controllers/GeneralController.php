<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Prismic\Api;
use Prismic\Predicates;


class GeneralController extends Controller
{
    protected $customPartners = array(
        '/cost/tuition-discounts/employer-partners/amazon',
        '/cost/tuition-discounts/employer-partners/list',
        '/cost/tuition-discounts/employer-partners/error',
        '/cost/tuition-discounts/employer-partners/thank-you',
        '/cost/tuition-discounts/employer-partners/5342',
        '/cost/tuition-discounts/employer-partners/aurora-public-schools-district',
        // '/cost/tuition-discounts/employer-partners/bright-horizons-education-access', // removed 8/4/21
        '/cost/tuition-discounts/employer-partners/colorado-post',
        '/cost/tuition-discounts/employer-partners/edumadic',
        '/cost/tuition-discounts/employer-partners/federal-academic-alliance',
        '/cost/tuition-discounts/employer-partners/international-scholarship-and-tuition-services-inc-ists',
        '/cost/tuition-discounts/employer-partners/tuition-manager'
    );

    protected $customColleges = array(
        '/admissions/transfer-info/affiliate-community-colleges/colby-community-college'
    );
    
    protected $slicesWithCR = array(
        'accolades-carousel' => array('accolade',0),
        'articles-list' => array('page_list',10)
    );
    
    public function execute(Request $request) {
        // echo '<br />inside execute()<br />';
        
        $this->getUtmTracking($request);

        $fullUriPath = $request->getPathInfo();

        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->query(Predicates::at('my.template_content_page.path', $fullUriPath));
        
        if (isset($prismicData->results[0])) {
            $prismicData = $this->checkContentRelationships($prismicData, $request->query());

            return view('generic.generic1', [
                'prismic' => $prismicData->results[0],
                'query' => $request->query()
            ]);
        } else {
            return redirect('/page-not-found?url='.$fullUriPath);
        }
    }

    public function home(Request $request) {
        // echo '<br />inside home()<br />';

        $this->getUtmTracking($request);
        
        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->query(Predicates::at('my.template_homepage.path', '/'));

        $prismicData = $this->checkContentRelationships($prismicData, $request->query());

        return view('generic.generic1', [
            'prismic' => $prismicData->results[0],
            'query' => $request->query()
        ]);
    }

    public function employer(Request $request, $employer) {
        // echo '<br />inside employer()<br />';

        if (in_array($request->getPathInfo(), $this->customPartners)) {
            return $this->execute($request);
        }

        $this->getUtmTracking($request);
        
        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->query(Predicates::at('my.item_employer_partner.url', $employer));

        if (!empty($prismicData->results) && $prismicData->results[0]->data->status == 'active') {

            $prismicData->results[0]->data->{'meta-title'} = $prismicData->results[0]->data->partner;
            $prismicData->results[0]->data->{'meta-description'} = $prismicData->results[0]->data->partner.' is an Employer Partner of CSU Global';
            $prismicData->results[0]->data->{'meta-keywords'} = 'industry employer partner affiliate';
            $prismicData->results[0]->data->path = 'https://csuglobal.edu/cost/tuition-discounts/employer-partners/'.$prismicData->results[0]->data->url;
            $prismicData->results[0]->data->rfi_custom_employer = true;

            return view('employer_partner', [
                'prismic' => $prismicData->results[0],
                'query' => $request->query()
            ]);
        } else {
            return redirect('/cost/tuition-discounts/employer-partners?search='.$employer);
        }

    }

    public function college(Request $request, $college) {
        // echo '<br />inside college()<br />';

        if (in_array($request->getPathInfo(), $this->customColleges)) {
            return $this->execute($request);
        }

        $this->getUtmTracking($request);
        
        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->query(Predicates::at('my.item_community_college.url', $college));

        if (!empty($prismicData->results) && $prismicData->results[0]->data->status == 'active') {
            
            $prismicData->results[0]->data->{'meta-title'} = $prismicData->results[0]->data->college.' - A CSU Global Affiliate Community College';
            $prismicData->results[0]->data->{'meta-description'} = $prismicData->results[0]->data->college.' is an Affiliate Community College width CSU Global';
            $prismicData->results[0]->data->{'meta-keywords'} = 'transfer affiliate community college';
            $prismicData->results[0]->data->path = 'https://csuglobal.edu/admissions/transfer-info/affiliate-community-colleges/'.$prismicData->results[0]->data->url;

            return view('community_college_affiliate', [
                'prismic' => $prismicData->results[0],
                'query' => $request->query()
            ]);
        } else {
            return redirect('/admissions/transfer-info/affiliate-community-colleges?search='.$college);
        }

    }

    public function blank(Request $request) {
        // echo '<br />inside blank()<br />';
        
        $this->getUtmTracking($request);
        
        $fullUriPath = $request->getPathInfo();

        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->query(Predicates::at('my.template_blank.path', $fullUriPath));

        return view('layout.blank', [
            'prismic' => $prismicData->results[0],
            'query' => $request->query()
        ]);
    }

    private function checkContentRelationships($prismicData, $query) {
        // echo '<br />inside checkContentRelationships()<br />';

        $sliceNum = 0;

        foreach($prismicData->results[0]->data->body1 as $slice) {
            if (key_exists($slice->slice_type, $this->slicesWithCR)) {

                $type = $this->slicesWithCR[$slice->slice_type];

                if ($type[0] == 'page_list') {
                    
                    $children = $this->getChildPages($prismicData->results[0]->id, $type[1], (isset($query['p']) ? $query['p'] : 1));
                    $prismicData->results[0]->data->body1[$sliceNum]->children = $children;
                } else {
                    $num = count($slice->items);
                    for ($i = 0; $i < $num; $i++) {
                        $doc = $this->getContentRelationship($slice->items[$i]->{$type[0]}->id);
                        
                        $prismicData->results[0]->data->body1[$sliceNum]->items[$i]->{$type[0]}->cr = $doc;
                    }
                }
            }
            $sliceNum++;
        }

        return $prismicData;
    }

    private function getContentRelationship($id) {
        // echo '<br />inside getContentRelationship()<br />';

        $api = Api::get(env('PRISMIC_API_ENDPOINT'));
        $prismicData = $api->getByID($id);

        return $prismicData;
    }

    private function getChildPages($id, $limit, $page) {
        // echo '<br />inside getChildPages()<br />';

        $api = Api::get(env('PRISMIC_API_ENDPOINT'));

        $children = $api->query(
            [ Predicates::at('document.type', 'template_content_page'),
              Predicates::at('my.template_content_page.parent_page', $id) ],
            [ 'pageSize' => $limit, 'page' => $page, 'orderings' => '[my.template_content_page.article_publish_date desc]' ]
        );

        return $children;
    }

    private function getUtmTracking($request) {

        $utm_source = ($request->query('utm_source') !== null ? $request->query('utm_source') : null);
        
        if ($utm_source !== null) {
            $utm_tracking = serialize($request->query());
            // $number_of_days = 30;
            // $date_of_expiry = time() + 60 * 60 * 24 * $number_of_days;
            // $date_of_expiry = 2;
            $minutes = 129600; // 90 days
            $sourceCode = Cookie::get('sourceCode').','.$utm_source;
    
            Cookie::queue('csug_utm', $utm_tracking, $minutes);

            if (Cookie::get('sourceCode') === null) {
                Cookie::queue('sourceCode', $utm_source, $minutes);
                session()->put('rfi.source', $utm_source);
            } else {
                Cookie::queue('sourceCode', $sourceCode, $minutes);
                session()->put('rfi.source', $sourceCode);
            }
        }

    }
}
