<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <style type="text/css">
         table a:link {
          color: #666;
          font-weight: bold;
          text-decoration:none;
        }
        table a:visited {
          color: #999999;
          font-weight:bold;
          text-decoration:none;
        }
        table a:active,
        table a:hover {
          color: #bd5a35;
          text-decoration:underline;
        }
        table {
          font-family:Arial, Helvetica, sans-serif;
          color:#666;
          font-size:12px;
          text-shadow: 1px 1px 0px #fff;
          background:#eaebec;
          margin:20px;
          border:#ccc 1px solid;

          -moz-border-radius:3px;
          -webkit-border-radius:3px;
          border-radius:3px;

          -moz-box-shadow: 0 1px 2px #d1d1d1;
          -webkit-box-shadow: 0 1px 2px #d1d1d1;
          box-shadow: 0 1px 2px #d1d1d1;
        }
        table th {
          padding:21px 25px 22px 25px;
          border-top:1px solid #fafafa;
          border-bottom:1px solid #e0e0e0;

          background: #ededed;
          background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
          background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
        }
        table th:first-child {
          text-align: left;
          padding-left:20px;
        }
        table tr:first-child th:first-child {
          -moz-border-radius-topleft:3px;
          -webkit-border-top-left-radius:3px;
          border-top-left-radius:3px;
        }
        table tr:first-child th:last-child {
          -moz-border-radius-topright:3px;
          -webkit-border-top-right-radius:3px;
          border-top-right-radius:3px;
        }
        table tr {
          text-align: center;
          padding-left:20px;
        }
        table td:first-child {
          text-align: left;
          padding-left:20px;
          border-left: 0;
        }
        table td {
          padding:18px;
          border-top: 1px solid #ffffff;
          border-bottom:1px solid #e0e0e0;
          border-left: 1px solid #e0e0e0;

          background: #fafafa;
          background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
          background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
        }
        table tr.even td {
          background: #f6f6f6;
          background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
          background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
        }
        table tr:last-child td {
          border-bottom:0;
        }
        table tr:last-child td:first-child {
          -moz-border-radius-bottomleft:3px;
          -webkit-border-bottom-left-radius:3px;
          border-bottom-left-radius:3px;
        }
        table tr:last-child td:last-child {
          -moz-border-radius-bottomright:3px;
          -webkit-border-bottom-right-radius:3px;
          border-bottom-right-radius:3px;
        }
        table tr:hover td {
          background: #f2f2f2;
          background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
          background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);  
        }
        </style>
    </head>
    <body>

      <div>
            <div >
             
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div >
            <div >
                <img id="logo" name="logo" src="{{TypeDocument::getDocumento()->logo}}"  >
                 <h2 >   
                <i></i> {{Auth::user()->account->name}}
                <small >Date: {{date("d/m/Y")}}</small>
                </h2>
                <br>
                {{Branch::find(Session::get('branch_id'))->address1}}<br>
                {{Branch::find(Session::get('branch_id'))->address2}}<br>
                Telefono:  {{Branch::find(Session::get('branch_id'))->work_phone}}<br>
                
                <table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->

  <!-- Table Header -->
  <thead>
    <tr>
      <th>Task Details</th>
      <th>Progress</th>
      <th>Vital Task</th>
    </tr>
  </thead>
  <!-- Table Header -->

  <!-- Table Body -->
  <tbody>

    <tr>
      <td>Create pretty table design</td>
      <td>100%</td>
      <td>Yes</td>
    </tr><!-- Table Row -->

    <tr class="even">
      <td>Take the dog for a walk</td>
      <td>100%</td>
      <td>Yes</td>
    </tr><!-- Darker Table Row -->

    <tr>
      <td>Waste half the day on Twitter</td>
      <td>20%</td>
      <td>No</td>
    </tr>

    <tr class="even">
      <td>Feel inferior after viewing Dribble</td>
      <td>80%</td>
      <td>No</td>
    </tr>

    <tr>
      <td>Wince at "to do" list</td>
      <td>100%</td>
      <td>Yes</td>
    </tr>

    <tr class="even">
      <td>Vow to complete personal project</td>
      <td>23%</td>
      <td>yes</td>
    </tr>

    <tr>
      <td>Procrastinate</td>
      <td>80%</td>
      <td>No</td>
    </tr>

    <tr class="even">
      <td><a href="#yep-iit-doesnt-exist">Hyperlink   Example</a></td>
      <td>80%</td>
      <td><a href="#inexistent-id">Another</a></td>
    </tr>

  </tbody>
  <!-- Table Body -->

</table>
             
            </div><!-- /.col -->
          

       
        
            <div >
              <p >Factura N° 35256</p>
              <div >
                <table>
                  <tbody><tr>
                    <th >Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </tbody></table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
        
  Factura Emitida por : {{Auth::user()->account->name}}

   <a class="btn btn-info" href="{{ $link }}"> VER FACTURA  </a>  

    </body>
</html>	 
