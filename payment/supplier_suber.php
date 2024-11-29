<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Subscribe Newsletter Form inside Modal</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
    body {
  font-family: 'Varela Round', sans-serif;
 } 
 .modal-newsletter { 
  color: #999;
  font-size: 15px;
 }
 .modal-newsletter .modal-content {
  padding: 40px;
  border-radius: 0;  
  border: none;
 }
 .modal-newsletter .modal-header {
  border-bottom: none;   
        position: relative;
  text-align: center;
  border-radius: 5px 5px 0 0;
 }
 .modal-newsletter h4 {
  color: #000;
  text-align: center;
  font-size: 30px;
  margin: 0 0 25px;
  font-weight: bold;
  text-transform: capitalize;
 }
 .modal-newsletter .close {
  background: #c0c3c8;
  position: absolute;
  top: -15px;
  right: -15px;
  color: #fff;
  text-shadow: none;
  opacity: 0.5;
  width: 22px;
  height: 22px;
  border-radius: 20px;
  font-size: 16px;
 }
 .modal-newsletter .close span {
  position: relative;
  top: -1px;
 }
 .modal-newsletter .close:hover {
  opacity: 0.8;
 }
 .modal-newsletter .form-control, .modal-newsletter .btn {
  min-height: 46px;
  border-radius: 3px; 
 }
 .modal-newsletter .form-control {
  box-shadow: none;
  border-color: #dbdbdb;
 }
 .modal-newsletter .form-control:focus {
  border-color: #19bc9c;
  box-shadow: 0 0 8px rgba(114, 101, 234, 0.5);
 }
    .modal-newsletter .btn {
        color: #fff;
        border-radius: 4px;
  background: #19bc9c;
  text-decoration: none;
  transition: all 0.4s;
        line-height: normal;
  padding: 6px 20px;
  min-width: 150px;
        border: none;
    }
 .modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
  background: #4e3de4;
  outline: none;
 }
 .modal-newsletter .input-group {
  margin: 30px 0 15px;
 }
 .hint-text {
  margin: 100px auto;
  text-align: center;
 }
 .btnb{
    margin-left: 200px;

 }
</style>
<script type="text/javascript">
 $(document).ready(function(){
  $("#myModal").modal('show');
 });
</script>
<div id="myModal" class="modal fade">
 <div class="modal-dialog modal-newsletter">
  <div class="modal-content">
  <form method="post" action="https://test.yenepay.com/">   
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>×</span></button>
    </div>
    <div class="modal-body text-center">
     <h4>እባክዎን ፈቃድዎን ያሳድሱ</h4> 
     <p>ወደ <b>የእኔ ክፍያ</b> ይሂዱ እና ይክፈሉ ከዚያ መግባት ይችላሉ።</p>
     <div class="input-group">
    
                                
   

        <input type="hidden" name="Process" value="Express">
        <!--A unique identifier for the payment order. Yenepay will attach it to the order and
            echo it back when sending you any inforamtion about the order. To let the customer complete
            unfinished order you can send it again with the same order info-->
        <input type="hidden" name="MerchantOrderId" value="">
        <!--Your yenepay merchant code-->
        <input type="hidden" name="MerchantId" value="SB2195">
        <!-- The ipn url that you want yenepay to send you ipn messages to. Note localhost is not accepted here-->
        <input type="hidden" name="IPNUrl" value="">
        <!-- The url in your website or application that you want yenepay to redirect the customer after completing their payment. Note localhost is not accepted here-->
        <input type="hidden" name="SuccessUrl" value="http://localhost/n7/afro_farming/payment/check.php">
        <!-- The url in your website or application that you want yenepay to redirect the customer when canceling their payment. Note localhost is not accepted here-->
        <input type="hidden" name="CancelUrl" value="https://sandbox.yenepay.com/Home/Details/d06576ea-11e8-49b0-b4eb-221d19d65b28?custId=6f577260-b88e-4f4e-843f-7ccd110ba8c2">
        <!--A unique identifier for each item in the order. You can leave this blank if you want too.-->
        <input type="hidden" name="ItemId" value="bcbebec2-e44d-45aa-89e6-4a4554a8c155">
        <!--The name for the item that that your customer is paying for-->
        <input type="hidden" name="ItemName" value="killo">
        <!--The unit price for the item this must be a positive decimal number and can not be empty or zero-->
        <input type="hidden" name="UnitPrice" value="150.00">
        <!--The quantity for the item this must be a positive integer number with minimum value of 1-->
        <!--The total price for the item will be determined by multiplying UnitPrice x Quantity for the item-->
        <input type="hidden" name="Quantity" value="1">
        <!--Submit button-->
        <input type="submit" value="ለመክፈል" class="btnb">
    

    
      
    
     </div>
    </div>
    </form>  
  </div>
 </div>
</div>
<p class="hint-text"><strong>ማስታወሻ:</strong>ይህ ገጽ የሚታየው ክፍያዎን የሚከፍሉበት ጊዜ ስለሆነ ነው።<br>እባክዎን ያድሱ</p>
</body>
</html>

