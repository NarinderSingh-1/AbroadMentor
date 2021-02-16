@extends('backend.layout')
@section('content')
<div class="row">
    <div class="info_head">
        <span><a href="{{url('/profile')}}"><i class="material-icons">arrow_back</i></a></span>
        <span>
            <h4>About the Institute</h4>
            <p>Give a brief description about the institute.</p>
        </span>
    </div>
    <div class="col s12">
        <div class="row">
            <form class="col s12 all_form" action="" method="post" role ='form'>
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="textarea1" class="materialize-textarea" data-length="1500" name="about_us">{{ $user->organisation->about_us }}</textarea>
                        <span>Need help with this?</span><a class="view_btn">View a smaple <i class="material-icons">expand_more</i></a>
                        <label for="textarea1">About Institute</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="textarea2" class="materialize-textarea" data-length="1500" name="mission">{{ $user->organisation->value_statement }}</textarea>
                        <label for="textarea2">Mission and Values Statement</label>
                    </div>
                </div>

                <div class="col s12">
                    <p class="view_con">ABCD Education Private Limited is India’s leading coaching institute for GMAT, GRE, IELTS, TOEFL, and SAT tests, since 2001. We offer comprehensive classroom and online preparation courses for study abroad exams. We have 21 centres across 12 cities in India, and two centres abroad in Dubai and Kathmandu. Each centre follows a uniform curriculum and supported by extraordinary Experts, who know ins and outs of the exams. In 2015, we helped 2,500 students crack study abroad exams and 800 professionals clear standardized English language tests. What differentiates ABCD from other coaching institutes is our expertise in test preparation techniques and excellent study materials prepared by Experts. Few of our students have been placed at Harvard, Yale, Oxford, and London School of Business.</p>
                </div>

                <button class="btn all-btn" type="submit">Done</button>
            </form>
        </div>
    </div>
</div>
@endsection