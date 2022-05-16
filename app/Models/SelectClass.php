<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildPage;
use App\Models\Testimonial;
use App\Models\Branch;
use App\Models\Team;
use App\Models\Advertisement;



class SelectClass extends Model
{


    public function selectReportUsingPID($PID)
    {

        $report = Report::select('blood_sugar', 'report_date')->where('patient_id', $PID)->get();

        //        dd($mainheading);
        return $report;
    }



    public function selectAdvertisement($position)
    {


        $advertisements = Advertisement::select('image', 'title')->where('position', $position)->get();

        return $advertisements;
    }


    public function selectParagraphOfPageDetailsFromTable($id)
    {
        $childContentDetails = ChildContent::select( 'text',)
            ->with(['Childpage' => function ($q) {
                $q->select(['id', 'child_title']);
            }])
            ->where('childpage_id', $id)
            ->get();



        return $childContentDetails;
    }



    public function selectSubHeading($heading)
    {

        $subheading = ChildPage::select('id', 'child_title')
            ->whereHas('parentpage', function ($q) use ($heading) {
                $q->where('title', $heading);
            })
            ->get();

        return $subheading;
    }

    public function selectHeading()
    {
        $mainheading = ParentPage::select('id', 'title')->get();

        //        dd($mainheading);
        return $mainheading;
    }


    public function selectTestimonial()
    {
        $testinomials = Testimonial::all();
        return  $testinomials;
    }

    public function selectindexBranch()
    {
        $branches = Branch::orderBy('id', 'DESC')->take(3)->get();
        return  $branches;
    }

    public function selectNews()
    {
        $selectNews = Post::orderBy('id', 'DESC')->take(2)->get();
        return  $selectNews;
    }


    public function selectBranch()
    {
        $branches = Branch::all();
        return  $branches;
    }

    public function selectTeam()
    {
        $teams = Team::all();
        return  $teams;
    }

    public function selectBlog()
    {
        $selectBlog = Blog::all();
        return  $selectBlog;
    }
}
