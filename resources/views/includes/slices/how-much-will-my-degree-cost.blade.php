<!-- how-much-will-my-degree-cost -->

@if (!in_array('type_program', $prismic->tags))

<div class="style-container padding" id="costSection">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <h2 align="center">How much will my degree cost?</h2>
             <div class="row flex-row">
                <div class="col-sm-6">
                   <div class="style-container whitebox noshadow centered">
                      <h3 class="noBorder">Tuition Rates</h3>
                      <p>Your education should increase your earning potential, not your monthly bills.</p>
                      <p><a class="btnOrange boxesLink" href="/cost/tuition/tuition-rates">Learn More</a></p>
                   </div>
                </div>
                <div class="col-sm-6">
                    <div class="style-container whitebox noshadow centered">
                      <h3 class="noBorder">Financial Aid</h3>
                      <p>You may be eligible to receive financial aid to help cover the cost of your education.</p>
                      <p><a class="btnOrange boxesLink" href="/cost/financial-options/financial-aid">Learn More</a></p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 @else

<div class="style-container padding cardSection">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 centered">
            <h2>How much will my degree cost?</h2>
            <div class="row flex-row">
               <div class="col-sm-6">
                  <div class="card centered">
                     <img src="https://prismic-io.s3.amazonaws.com/csug/dd541622-00f8-4fc0-880a-e218d219132b_icon-rates.svg" />
                     <h3 class="noBorder">Tuition Rates</h3>
                     <p>Your education should increase your earning potential, not your monthly bills.</p>
                     <a class="btnOrange boxesLink" href="/cost/tuition/tuition-rates">Learn More →</a>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="card centered">
                     <img src="https://prismic-io.s3.amazonaws.com/csug/0918313b-de89-4714-8006-7b688addf2c7_icon-aid.svg" />
                     <h3 class="noBorder">Financial Aid</h3>
                     <p>You may be eligible to receive financial aid to help cover the cost of your education.</p>
                     <a class="btnOrange boxesLink" href="/cost/financial-options/financial-aid">Learn More →</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

 @endif