@extends('_master')

@section('title')
    Scenarios &amp; Calculators
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
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="years" class="col-sm-6 control-label">Years</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="target" class="col-sm-6 control-label">Target</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="7500">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly" class="col-sm-6 control-label">Monthly Amount</label>
                    <div class="col-sm-4">
                         <p class="form-control-static">$48.30</p>
                    </div>
                </div>

            </form>

            <hr>

            <h3>Total Based on Monthly Amount</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="years" class="col-sm-6 control-label">Years</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly" class="col-sm-6 control-label">Monthly Amount</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly" class="col-sm-6 control-label">Total for School</label>
                    <div class="col-sm-4">
                         <p class="form-control-static">$3,106</p>
                    </div>
                </div>

            </form>

            <hr>
    
            <h3>Number of Years Based on Target</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="years" class="col-sm-6 control-label">Total Target</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="target" class="col-sm-6 control-label">Monthly Amount</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="50">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly" class="col-sm-6 control-label">Number of Years</label>
                    <div class="col-sm-4">
                         <p class="form-control-static">12.15</p>
                    </div>
                </div>

            </form>

            <hr>
    
            <h3>Monthly Gift with Up Front Cash</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="years" class="col-sm-6 control-label">Years</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="target" class="col-sm-6 control-label">Up Front Cash</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="2500">
                    </div>
                </div>
                <div class="form-group">
                    <label for="target" class="col-sm-6 control-label">Target</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" value="10000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="monthly" class="col-sm-6 control-label">Monthly Payments</label>
                    <div class="col-sm-4">
                         <p class="form-control-static">37.88</p>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
