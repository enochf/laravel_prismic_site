<!-- why-earn-online-degree -->

@if (!in_array('type_program', $prismic->tags))

<div class="style-container centered">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <h2>Why You Should Earn Your Online Undergraduate Degree</h2>
                    <p class="intro">At CSU Global, you get more than just a diploma. Our career-driven curricula are based on real-world concepts that help you excel in the workplace on day one. You’ll get training and experience from faculty who have worked in your chosen field. And because we know how hard it can be for modern learners to juggle education, work, and family responsibilities, we lock in your tuition rate so you can enjoy the same affordability for the duration of your enrollment.</p>
                    <div class="row icons">
                        <div class="col-sm-3">
                            <p><img src="{{ asset('imgs/icon-100percent.png') }}" alt="desktop icon" width="90" height="93"></p>
                            <p>ONLINE ACCREDITED DEGREES</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="{{ asset('imgs/icon-nosettimes.png') }}" alt="clock icon" width="90" height="93"></p>
                            <p>NO SET TIMES OR LOCATIONS</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="{{ asset('imgs/icon-monthly.png') }}" alt="calendar icon" width="90" height="93"></p>
                            <p>MONTHLY CLASS START</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="{{ asset('imgs/icon-accelerated.png') }}" alt="stopwatch icon" width="90" height="93"></p>
                            <p>ACCELERATED COURSES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else

<div class="style-container centered whyChoose">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <h2>Why Should You Choose CSU Global?</h2>
                    
                    @if (!in_array('amazon', $prismic->tags))

                        <p class="intro">CSU Global provides more than just a diploma. Our career-driven programs are based on real-world concepts designed to help you excel in the workplace from day one. Our Tuition Guarantee ensures that your rate won’t rise from enrollment to graduation, and because we know how hard it can be to juggle education, work, and family responsibilities, our programs can be completed entirely online, with no set times or locations, monthly class starts and accelerated courses.</p>

                    @else

                        <p class="intro">CSU Global provides more than just a diploma. Our career-driven programs are based on real-world concepts designed to help you excel in the workplace from day one. With a 100% online learning environment and monthly class starts, our programs can be completed on your schedule while still keeping you accountable and moving forward to reach your educational goals. Our extensive student support services are available at no charge to Amazon Career Choice participants, and include career coaching, tutoring, technical support and much more.</p>

                    @endif

                    <div class="row icons">
                        <div class="col-sm-3">
                            <p><img src="https://prismic-io.s3.amazonaws.com/csug/f1097353-d9c9-437b-93cc-30b5883ec69f_icon-computer.svg" height="93"></p>
                            <p>100% Online Degrees</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="https://prismic-io.s3.amazonaws.com/csug/a3e409b8-1776-43ff-9715-fc31df424755_icon-clock.svg" alt="clock icon" height="93"></p>
                            <p>No Set Times or Locations</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="https://prismic-io.s3.amazonaws.com/csug/26f72112-f04f-4454-919d-6fa19762fffe_icon-calendar.svg" alt="calendar icon" height="93"></p>
                            <p>Monthly Class Starts</p>
                        </div>
                        <div class="col-sm-3">
                            <p><img src="https://prismic-io.s3.amazonaws.com/csug/07f432d4-14c8-4785-b53a-0fe0937737fa_icon-stopwatch.svg" alt="stopwatch icon" height="93"></p>
                            <p>Accelerated Courses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif