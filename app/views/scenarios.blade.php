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

    <div class="table-row">
        <h2>Monthly Donation Scenarios &amp; Calculators</h2>
        <div class="col-md-6">
            <h3>Monthly Amounts by Target Gift</h3>
            <table class="table table-bordered table-condensed">
              <tr>
                <th>Total Amount</th>
                <th>Monthly Gift</th>
                <th>Out of Pocket (Total)</th>
              </tr>
              <tr>
                <td>$1,000</td>
                <td>$6.44</td>
                <td>$773</td>
              </tr>
              <tr>
                <td>$2,015</td>
                <td>$12.98</td>
                <td>$1,557</td>
              </tr>
              <tr>
                <td>$5,000</td>
                <td>$32.20</td>
                <td>$3,864</td>
              </tr>
              <tr>
                <td>$10,000</td>
                <td>$64.40</td>
                <td>$7,728</td>
              </tr>
              <tr>
                <td>$25,000</td>
                <td>$161.00</td>
                <td>$19,320</td>
              </tr>
              <tr>
                <td>$50,000</td>
                <td>$321.99</td>
                <td>$38,639</td>
              </tr>
              <tr>
                <td>$100,000</td>
                <td>$643.99</td>
                <td>$77,279</td>
              </tr>
            </table>

            <h3>Gifts Based on Monthly Amounts</h3>
            <table class="table table-bordered table-condensed">
              <tr>
                <th>Monthly Gift</th>
                <th>Total for School</th>
                <th>Out of Pocket (Total)</th>
              </tr>
              <tr>
                <td>$5</td>
                <td>$776</td>
                <td>$600</td>
              </tr>
              <tr>
                <td>$10</td>
                <td>$1,553</td>
                <td>$1,200</td>
              </tr>
              <tr>
                <td>$25</td>
                <td>$3,882</td>
                <td>$3,000</td>
              </tr>
              <tr>
                <td>$50</td>
                <td>$7,764</td>
                <td>$6,000</td>
              </tr>
              <tr>
                <td>$100</td>
                <td>$15,528</td>
                <td>$12,000</td>
              </tr>
              <tr>
                <td>$150</td>
                <td>$23,292</td>
                <td>$18,000</td>
              </tr>
              <tr>
                <td>$200</td>
                <td>$31,056</td>
                <td>$24,000</td>
              </tr>
              <tr>
                <td>$300</td>
                <td>$46,585</td>
                <td>$36,000</td>
              </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Monthly Gift Based on Target</h3>
            <form class="form-horizontal" role="form" id="form1">
                <div class="form-group">
                    <label for="total1" class="col-sm-6 control-label">Target</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10000" id="total1">
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

            </form>

            <hr>
    
            
        </div>
    </div>
@stop
