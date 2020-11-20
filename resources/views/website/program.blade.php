@extends('layouts/web')
@section('content')

<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#programme_nav').addClass("menu-active");
    });

</script>

    <!--==========================
    Hero Section
    ============================-->
    <section id="hero" style="background-image: url({{ asset('img/background/hero-back.png') }}); height:200px">
        <div class="page-hero-container">
            <h1 style="padding-top:30px">Programme Structure</h1>
        </div>
    </section><!-- #hero -->

  <main id="main">

    <!--==========================
      Programme Section
    ============================-->
    <section id="programme" style="padding-top: 80px;">
        <!-- smain header -->
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-1 order-1">
                <h2 class="title">What are the available Courses?</h2>
                <br/>
                <h4>Foundation in Information Technology (FIT) programme consists of <b>three courses</b> and all examinations are conducted <b>only in English medium.</b></h4>            </div>
        </div><!-- #main header -->

        <!-- FIT 103 -->
        <div class="row about-container" style="padding-top: 80px;">
            <div class="col-lg-8 content order-lg-1 order-1">
                <strong>FIT 103: ICT Applications</strong>
                <p>This course provides basic ICT (Information and Communication Technology) knowledge and skills required for the office environment. It ensures that the learner possesses required knowledge and skills to use office applications competently. It encompasses eight modules: (1) Computing for the Society, (2) Introduction to Computers, (3) Word Processing for Electronic Documents, (4) Spreadsheets for Calculation, (5) Multimedia and Electronic Presentation, (6) Data and Databases, (7) The Internet and Web Applications, and (8) Programming. Also, students could use Microsoft Office 365 as the office package when they sit for examination. There will be a two-hour Multiple-Choice Questions (MCQs) based e-Test and a two-hour practical test for Fundamentals of Computing course.</p>
            </div>
            <div class="myBox col-lg-4 background order-lg-2 order-2 wow fadeInRight" style="background-image: url({{ asset('img/logo/fit103.png') }});  cursor: pointer;">
                <a target="_blank" class="" href="{{ asset('documents/FIT-103/FIT-103-Fundamentals_of_Computing.pdf') }}"></a>
            </div>
        </div><!-- #FIT 103 -->

        <!-- FIT 203 -->
        <div class="row about-container">
            <div class="myBox col-lg-4 background order-lg-1 order-2 wow fadeInLeft" style="background-image: url({{ asset('img/logo/fit203.png') }});  cursor: pointer;">
                <a target="_blank" href="{{ asset('documents/FIT-203/FIT-203-English_for_Computing.pdf') }}"></a>
            </div>
            <div class="col-lg-8 content order-lg-2 order-1" style="text-align: right;">
                <strong>FIT 203: English for ICT</strong>
                <p>This course has been designed to provide language and communication skills in English from beginners to intermediate learners who want to pursue studies as well as careers in Information Communication Technology (ICT). All four areas of competency in English language, such as Reading, Listening, Speaking and Writing will be covered in this syllabus and the learning activities are designed considering ICT working environment. There will be a two-hour Multiple-Choice Questions (MCQs) based e-Test to evaluate reading, listening capabilities and a two-hour practical test to evaluate speaking and writing skills.</p>   
            </div>
        </div><!-- FIT #103 -->

        <!-- FIT 303 -->
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-1 order-1">
                <strong>FIT 303: Mathematics for ICT</strong>
                <p>Mathematics plays an important role in Information Technology. The aim of this course is to provide basic mathematical and statistical concepts. After successful completion of this course, the learner will possess problem solving and analytical skills together with required mathematical & statistical knowledge to solve problems in computing. Hence, this will be very useful for anyone who is planning to pursue a carrier in ICT or related sector. There will be a two-hour Multiple-Choice Questions (MCQs) based e-Test.
                </p>
            </div>
            <div class="myBox col-lg-4 background order-lg-2 order-2 wow fadeInRight" style="background-image: url({{ asset('img/logo/fit303.png') }}); cursor: pointer;">
                <a target="_blank"  href="{{ asset('documents/FIT-303/FIT-303-Mathematics_for_Computing.pdf') }}"></a>
            </div>
        </div><!-- #FIT 103 -->

        <!-- NEXT STEP -->
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-1 order-2">               
                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                    <a href="learning"><div class="icon"><i class="fab fa-leanpub"></i></div></a>
                    <h4 class="title"><a href="learning">Learning</a></h4>
                    <p class="description">How you learn FIT</p>
                </div>
            </div>
        </div><!-- #NEXT STEP -->
    </section>
    <!-- Accordion -->
    <section id="acordion">
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-1 order-2">
                <h2 class="title">Frequently Asked Questions</h2>
            </div>
            <div class="col-lg-4 content order-lg-2 order-2 "> 
                <a class="float-right faq-sm wow fadeInRight" target="_blank" href="{{ url('/faq') }}"><i class="fa fa-question-circle"></i> More FAQ</a>
    
            </div>
        </div>
        <div class=""> 


                <h2 class="acc_trigger title"><a href="#toggle1"><i class="fa fa-question-circle pr-3"></i>How long will it take to complete FIT?</a></h2>
                <div class="acc_container">
                    <div class="block">
                        <p class="">
                            <ul>
                                <li>Generally, it takes 8-10 months to complete all courses if it is very beginner. However, it depends on the past experience and your knowledge in the area.</b>  at UCSC. Moreover, it will be an added qualification for those who seek higher education in ICT or employment in the IT industry or BPO industry.</li>
                            </ul>
                        </p>
                    </div>
                </div>
                
                <h2 class="acc_trigger title"><a href="#toggle2"><i class="fa fa-question-circle pr-3"></i>How can I make a complain about FIT programme?</a></h2>
                <div class="acc_container">
                    <div class="block">
                        <p class="">
                            <ul>
                                <li>Please contact the relevant facilitator of the course, through a forum, message or email. Contact details are given in the online course page through FIT LMS. If it is a system related problem, contact VLE admin directly by using the e-mail admin@lms.bit.lk . If you are not satisfied with the reply, contact the coordinator of VLE through ( <a href="mailto:kph@ucsc.cmb.ac.lk">kph@ucsc.cmb.ac.lk</a>  ). If you are still not satisfied with the reply, send your complain in writing to the Director, UCSC by using the e-mail ( <a href="director@ucsc.cmb.ac.lk">director@ucsc.cmb.ac.lk</a>  ).</li>
                            </ul>
                        </p>
                    </div>
                </div>
                
                <h2 class="acc_trigger title"><a href="#toggle3"><i class="fa fa-question-circle pr-3"></i>How can I make a complain about FIT programme?</a></h2>
                <div class="acc_container">
                    <div class="block">
                        <p class="">
                            <ul>
                                <li>Please email your suggestions, comments and feedback to head and coordinator of e-Learning Centre, UCSC through email ( <a href="mailto:kph@ucsc.cmb.ac.lk">kph@ucsc.cmb.ac.lk</a> ).</li>
                            </ul>
                        </p>
                    </div>
                </div>
                

        
            
        </div>
    </section>
    <!-- .// Accordion -->

  </main>

@endsection
