
<html>
    <head>
        <script type="text/javascript">
            function submitForm()
            {
                var postForm = document.forms.postForm;
                postForm.submit();
            }
        </script>
    </head>
    <body onload="submitForm()">
        <div class="container">
            <div class="row">
                <form name="postForm" method="POST" action="https://secure.payu.in/_payment">
                    <div class="col-md-12">
                        <input name="key" type="hidden" value="{{ $order_data['key'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="txnid" type="hidden" value="{{ $order_data['txnid'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="amount" type="hidden" value="{{ $order_data['amount'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="firstname" type="hidden" value="{{ $order_data['firstname'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="email" type="hidden" value="{{ $order_data['email'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="phone" type="hidden" value="{{ $order_data['phone'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="productinfo" type="hidden" value="{{ $order_data['productinfo'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="surl" type="hidden" value="{{ $order_data['surl'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="furl" type="hidden" value="{{ $order_data['furl'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="service_provider" type="hidden" value="{{ $order_data['service_provider'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="hash" type="hidden" value="{{ $order_data['hash'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="udf1" type="hidden" value="{{ $order_data['udf1'] }}">
                    </div>
                    <div class="col-md-12">
                        <input name="udf2" type="hidden" value="{{ $order_data['udf2'] }}">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
