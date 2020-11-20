@extends('layouts/web')
@section('content')

<script type="text/javascript">

    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#learning_nav').addClass("menu-active");
    });

</script>

    <!--==========================
    Hero Section
    ============================-->
    <section id="hero" style="background-image: url({{ asset('img/background/hero-back.png') }}); height:200px">
        <div class="page-hero-container">
            <h1 style="padding-top:30px">Learning for FIT</h1>
        </div>
    </section><!-- #hero -->

  <main id="main">

    <!--==========================
      Learning Section
    ============================-->
    <section id="learning" style="padding-top: 80px;">
        <!-- smain header -->
        <div class="row about-container">
            <div class="col-lg-7 content order-lg-1 order-1">
                <h2 class="title">Virtual Learning Environment</h2>
                <br/>
                <h4>All registered FIT students will receive a registration number and a password to access the online learning management system</h4>
                <br/>
                <p>Once your payment is confirmed for the registration, you will be notified with login details. It is mandatory to include a valid email address when you register for the FIT programme. Otherwise you have to contact External Degrees Centre of UCSC to find out the status of your registration.
                    <br/><b>Tel: <a href="tel:+94114720511">011 4720511 </a>/ <a href="tel:+94114720513">011 4720513</a> </b>
                </p>
                <p>Within 2 weeks of registration we will enroll you to the LMS online courses. If you could not access the LMS after 2 weeks with the given username and password, please contact the LMS administrator.
                    <b><br/>Email:<a href="mailto:admin@fit.bit.lk">admin@fit.bit.lk</a>  
                    <br/>Tel: <a href="tel:+94112591080">011 2591080</a> </b>
                </p>
                <p>There are three separate online courses for the FIT Programme. You can access online interactive e-learning content and discuss with other learners and online e-facilitators in the course.</p>
                <p>Several private teaching institutes in Sri Lanka conduct classes based on the FIT curriculum. Students are kindly advised to directly contact these institutes if they are interested to attend face to face classes based on the FIT programme.</p>
                <p>It is important to mention that all FIT exams will be conducted in English medium and all learning materials developed based on the curriculum are available in English.</p>   
                
                <a target="_blank" href="http://fit.bit.lk/vle"><button id="vle_link" class="btn btn-primary"> Go to VLE</button></a>
            </div>

            <div class="myBox col-lg-5 background order-lg-2 order-2 wow fadeInRight" style="background-image: url({{ asset('img/logo/vle-logo.png') }}); cursor: pointer; margin-top:200px;">
                <a target="_blank"  href="http://fit.bit.lk/vle"></a>
            </div>
        </div><!-- #main header -->

        <!-- DETAILS -->
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-2 order-1" style="text-align: left;">
                </div>
        </div><!-- #DETAILS -->
    
        <!-- NEXT STEP -->
        <div class="row about-container">
            <div class="col-lg-8 content order-lg-1 order-2">               
                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s" style="padding-top: 80px;">
                    <a href="examination"><div class="icon"><i class="fas fa-file-alt"></i></div></a>
                    <h4 class="title"><a href="examination">Examination</a></h4>
                    <p class="description">How to sit for your FIT Examinations</p>
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
            </div>
            <div class=""> 


                    <h2 class="acc_trigger title"><a href="#toggle1"><i class="fa fa-question-circle pr-3"></i>Does UCSC conduct classes for FIT?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li><b>No</b> UCSC will not conduct any face-to-face classes. Private institutes conduct face-to-face classes based on the FIT programme. However, UCSC will not undertake any responsibility or comment on their performances.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    
                    <h2 class="acc_trigger"><a href="#toggle2"><i class="fa fa-question-circle pr-3"></i>Where can I learn for FIT?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li>You can follow online courses of FIT programme if you have some similar IT experience. Otherwise, you can select a private institute which conducts classes based on the FIT programme.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    
                    <h2 class="acc_trigger"><a href="#toggle3"><i class="fa fa-question-circle pr-3"></i>Are these online courses enough to complete FIT?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li>Online courses provide general guidance for a self-learning student. They are designed and developed based on the FIT curriculum. However, if you find difficult to understand the subject matter given in the syllabus and online courses, it is better to consider attending classes conducted by a private institute.</li>
                                    
                                </ul>
                            </p>
                        </div>
                    </div>
                                
                    <h2 class="acc_trigger"><a href="#toggle4"><i class="fa fa-question-circle pr-3"></i>Should I go to Institute to complete FIT programme?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li>No there is no compulsory requirement. There are lot of self-learning students who follow FIT programme. However, if you find difficult to understand the subject matter given in the syllabus and online courses, it is better to consider attending classes conducted by a private institute.</li>
                                    
                                </ul>
                            </p>
                        </div>
                    </div>
                                                    
                    <h2 class="acc_trigger"><a href="#toggle4"><i class="fa fa-question-circle pr-3"></i>How long will it take to get access to online system (LMS) after registration?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li>It will take 3-4 working days (after receiving your registration detail from the EDC) to create your account. If you have provided an email address, we will inform as soon as we create an account in the online system. If it is delayed more than two days, please contact External Degree Centre or e-Learning Centre. <a href="http://fit.bit.lk/contactUs">http://fit.bit.lk/contactUs</a> </li>
                                    
                                </ul>
                            </p>
                        </div>
                    </div>

                    <h2 class="acc_trigger"><a href="#toggle4"><i class="fa fa-question-circle pr-3"></i>Is there any different between old and new syllabus?</a></h2>
                    <div class="acc_container">
                        <div class="block">
                            <p class="">
                                <ul>
                                    <li>Yes, there are some differences and those improvements are done to enhance the FIT programme. All students are supposed to follow the current syllabus.</a> </li>
                                    
                                </ul>
                            </p>
                        </div>
                    </div>

            </div>
        </section>
        <!-- .// Accordion -->


  </main>

@endsection
