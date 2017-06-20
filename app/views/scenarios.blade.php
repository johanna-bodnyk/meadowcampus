@extends('_master')

@section('title')
    Scenarios &amp; Calculators
@stop

@section('head')
    <script src="/js/scenarios.js"></script>
@stop

@section('body-class')
    scenarios
@stop

@section('content')
    <h2>Monthly Donation Scenarios &amp; Calculators</h2>
    <p class="lead">A monthly pledge of $64.40, continued for 10 years (with 5% interest), will net the school $10,000.</p>
    <div class="row">
        <div class="col-md-6">
            <h3>Monthly Amounts by Target Gift</h3>
            <table class="table table-condensed table-striped gift-table">
              <tr>
                <th>Total Amount*</th>
                <th>Monthly Gift</th>
                <th>Out of Pocket (Total)*</th>
                <th>Pledge this Amount</th>
              </tr>
              <tr>
                <td>$1,000</td>
                <td>$6.44</td>
                <td>$773</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"6.44"}}' target="_blank" class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$2,015</td>
                <td>$12.98</td>
                <td>$1,557</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"12.98"}}' target="_blank" class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$5,000</td>
                <td>$32.20</td>
                <td>$3,864</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"32.20"}}' target="_blank" class="btn btn-xs btn-success" role="button">Pledge now</a></td>                
              </tr>
              <tr>
                <td>$10,000</td>
                <td>$64.40</td>
                <td>$7,728</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"64.40"}}' target="_blank" class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$25,000</td>
                <td>$161.00</td>
                <td>$19,320</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"161.00"}}'
                target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$50,000</td>
                <td>$321.99</td>
                <td>$38,639</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"321.99"}}'
                target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$100,000</td>
                <td>$643.99</td>
                <td>$77,279</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"643.99"}}'
                target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
            </table>

            <h3>Gifts Based on Monthly Amounts</h3>
            <table class="table table-striped table-condensed gift-table">
              <tr>
                <th>Monthly Gift</th>
                <th>Total for School*</th>
                <th>Out of Pocket (Total)*</th>
                <th>Pledge this Amount</th>
              </tr>
              <tr>
                <td>$5</td>
                <td>$776</td>
                <td>$600</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"5"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$10</td>
                <td>$1,553</td>
                <td>$1,200</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"10"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$25</td>
                <td>$3,882</td>
                <td>$3,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"25"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$50</td>
                <td>$7,764</td>
                <td>$6,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"50"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$100</td>
                <td>$15,528</td>
                <td>$12,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"100"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$150</td>
                <td>$23,292</td>
                <td>$18,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"150"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$200</td>
                <td>$31,056</td>
                <td>$24,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"200"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
              <tr>
                <td>$300</td>
                <td>$46,585</td>
                <td>$36,000</td>
                <td><a href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"300"}}' target="_blank"  class="btn btn-xs btn-success" role="button">Pledge now</a></td>
              </tr>
            </table>
            <p>*Totals and out of pocket totals based on a monthly pledge continuing for 10 years.</p>
        </div>
        <div class="col-md-6">
            <h3>Monthly Gift Based on Target</h3>
            <form class="form-horizontal" role="form" id="form1">
                <div class="form-group">
                    <label for="total1" class="col-sm-6 control-label">Target</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10000" id="total1" step="100">
                    </div>
                </div>
                <div class="form-group">
                    <label for="years1" class="col-sm-6 control-label">Years</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10" id="years1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly1" class="col-sm-6 control-label">Monthly Amount</label>
                    <div class="col-sm-4">
                         <p class="form-control-static" id="monthly1">$64.40</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pocket1" class="col-sm-6 control-label">Total Out of Pocket</label>
                    <div class="col-sm-4">
                         <p class="form-control-static" id="pocket1">$7,728</p>
                    </div>
                </div>
                <div class="text-center">
                    <a id="calc-button1" href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"64.40","ContinuingFor":"10 years"}}' target="_blank" class="btn btn-success" role="button">Pledge $<span id="button-label1">64.40</span>/month</a>
                </div>

            </form>

            <hr>

            <h3>Total Based on Monthly Amount</h3>
            <form class="form-horizontal" role="form" id="form2">
                <div class="form-group">
                    <label for="monthly2" class="col-sm-6 control-label">Monthly Amount</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="50" id="monthly2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="years2" class="col-sm-6 control-label">Years</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10" id="years2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="total2" class="col-sm-6 control-label">Total for School</label>
                    <div class="col-sm-4">
                         <p class="form-control-static" id="total2">$7,764</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pocket2" class="col-sm-6 control-label">Total Out of Pocket</label>
                    <div class="col-sm-4">
                         <p class="form-control-static" id="pocket2">$6,000</p>
                    </div>
                </div>
                <div class="text-center">
                    <a id="calc-button2" href='https://www.cognitoforms.com/TheCircleSchool1/MeadowCampusFundMonthlyPledgeSignup?entry={"DonationInformation":{"Amount":"50","ContinuingFor":"10 years"}}' target="_blank" class="btn btn-success" role="button">Pledge $<span id="button-label2">50.00</span>/month</a>
                </div>

            </form>

            <hr>
    
            
        </div>
    </div>
@stop
