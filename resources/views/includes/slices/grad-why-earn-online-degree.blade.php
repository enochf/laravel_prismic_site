<!-- grad-why-earn-online-degree -->
<div class="style-container centered icons">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Why You Should Earn Your Online Master’s Degree</h2>
                        <p class="intro">Earning your online master’s degree through CSU Global provides you with more than just the diploma you need to get noticed. With an emphasis on real world concepts and career-relevant skills, you get training and experience along with your credit hours. Additionally, CSU Global strives to make your education as affordable as possible. With our Tuition Guarantee, your tuition rate won’t increase over time! Instead, you’ll enjoy the same low rate for the duration of your enrollment at CSU Global.</p>
                        <div class="row icons">
                            {{-- // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                            {{-- // EXCEPTION - no monthly starts for the nursing degree --}}
                            @if ($_SERVER['REQUEST_URI'] == '/graduate/masters-degrees/nursing')

                            <div class="col-sm-4">
                                <p><img src="{{ asset('imgs/icon-100percent.png') }}" alt="desktop icon" width="90" height="93"></p>
                                <p>ONLINE ACCREDITED DEGREES</p>
                            </div>
                            <div class="col-sm-4">
                                <p><img src="{{ asset('imgs/icon-nosettimes.png') }}" alt="clock icon" width="90" height="93"></p>
                                <p>NO SET TIMES OR LOCATIONS</p>
                            </div>
                            <div class="col-sm-4">
                                <p><img src="{{ asset('imgs/icon-accelerated.png') }}" alt="stopwatch icon" width="90" height="93"></p>
                                <p>ACCELERATED COURSES</p>
                            </div>
                            
                            @else
                            
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

                            @endif
                            {{-- // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>