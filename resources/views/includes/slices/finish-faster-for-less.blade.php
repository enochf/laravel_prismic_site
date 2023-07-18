<!-- finish-faster-for-less -->

@if (!in_array('type_program', $prismic->tags))

<div class="style-container gray equalheight centered" id="altCredit">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <h2>Finish Faster and For Less with Alternative Credit Options</h2>
            <div class="style-container flex-row">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="style-container whitebox">
                            <h3>Credit by Exam</h3>
                            <p>You can get credit by taking exams for what you have already learned.</p>
                            <a href="/undergraduate/alternative-credit-options/credit-exam" class="btndBlue altcreditLink">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="style-container whitebox">
                            <h3>Self-Study Assessments (SSA)</h3>
                            <p>CSU Global will help you prepare to earn course credits for taking a proctored exam for specific content areas.</p>
                            <a href="/undergraduate/alternative-credit-options/self-study-assessments" class="btndBlue altcreditLink">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="style-container whitebox">
                            <h3>CSU Global Prior Learning Assessment (PLA)</h3>
                            <p>Earn credit for what you have already learned in your career or other educational experience.</p>
                            <a href="/undergraduate/alternative-credit-options/prior-learning-assessment-pla" class="btndBlue altcreditLink">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@else

<div class="style-container padding cardSection cardSection--white gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 centered">
                <h2>Finish Faster and For Less with Alternative Credit Options</h2>
                <div class="row flex-row">
                    <div class="col-sm-4">
                        <div class="card centered">
                            <img src="https://prismic-io.s3.amazonaws.com/csug/d1e1793e-ab16-4b9c-a6bd-7801ca64b047_icon-exam.svg" />
                            <h3 class="noBorder">Credit By Exam</h3>
                            <p>You can get credit by taking exams for what you have already learned.</p>
                            <a class="btnOrange boxesLink" href="https://csuglobal.edu/undergraduate/alternative-credit-options/credit-exam">Learn More →</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card centered">
                            <img src="https://prismic-io.s3.amazonaws.com/csug/0d1c75f8-1754-4ef3-b95d-c24c8aca70a8_icon-study.svg" />
                            <h3 class="noBorder">Self-Study Assessments</h3>
                            <p>Earn course credits for taking a proctored exam for specific content areas.</p>
                            <a class="btnOrange boxesLink" href="https://csuglobal.edu/undergraduate/alternative-credit-options/self-study-assessments">Learn More →</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card centered">
                            <img src="https://prismic-io.s3.amazonaws.com/csug/dd806e6b-6744-445b-9ca8-b442b44f7c99_icon-learning.svg" />
                            <h3 class="noBorder">Prior Learning Assessment</h3>
                            <p>Earn credit for what you’re learned in your career or other educational experience.</p>
                            <a class="btnOrange boxesLink" href="https://csuglobal.edu/undergraduate/alternative-credit-options/prior-learning-assessment-pla">Learn More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif