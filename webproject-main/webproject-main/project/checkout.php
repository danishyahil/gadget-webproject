<?php require_once("inc/navCheckout.html"); ?>
<div class="container">
  <main>
    <div class="py-5">
      <h2>Checkout</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          Your Cart
          <?php
          session_start();
          $i = 0;
          if (count($_SESSION['products']) > 0) {
              foreach ($_SESSION['products'] as $key => $product) {
                $i++;
          
              }
              echo '<span class="badge bbb rounded-pill">' . $i . '</span>';
            }
          ?>
        </h4>
        <ul class="list-group mb-3">
        <?php
                    if (count($_SESSION['products']) > 0) {
                        foreach ($_SESSION['products'] as $key => $product) {
                            echo '<li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">' . $product["name"] .'</h6>
                              <small class="text-muted">Qty: ' . $product["qty"] .'</small>
                            </div>
                            <span class="text-muted">RM ' . $product["price"] . '</span>
                          </li>';
                        }
                    }

                    if (count($_SESSION['products']) > 0) {
                        $total = 0;
                        foreach ($_SESSION['products'] as $key => $product) {
                            $total = $total + ($product['qty'] * $product['price']);
                        }
                        
                    }
                    ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (MYR)</span>
            <strong>RM <?php echo $total; ?></strong>
          </li>
        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form  id="checkoutForm" name="checkoutForm" class="needs-validation" method="post" action="confirmation.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" name="country" id="country" required="">
                <option value="Malaysia">Malaysia</option>
              </select>
              <small class="text-muted">We only ship to customers in Malaysia.</small>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" id="state" required="">
                <option value="">Choose...</option>
                <option>Selangor</option>
                <option>Sarawak</option>
                <option>Kedah</option>
                <option>Negeri Sembilan</option>
                <option>Pahang</option>
                <option>Perak</option>
                <option>Sabah</option>
                <option>Sarawak</option>
                <option>Johor</option>
                <option>Terengganu</option>
                <option>Malacca</option>
                <option>Kelantan</option>
                <option>Perlis</option>
                <option>Penang</option>
                <option>W.P Kuala Lumpur</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Postcode</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="" required="">
              <div class="invalid-feedback">
                Postcode code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
              <label class="mb-2 form-check-label" for="credit">Credit/Debit card</label>
            </div>


          <hr class="my-4">

          <input type="submit" class="w-100 btn btn-primary btn-lg" value="Continue to checkout">
        </form>
      </div>
    </div>
  </main>
</div>
<script>
  function validateForm(checkoutForm)   
{
    var messages = [];
    if (document.checkoutForm.firstName.value=="")
    {
        messages.push("Please fill in your first name.");
    }
    if (document.checkoutForm.lastName.value=="")
    {
        messages.push("Please fill in your last name.");
    }
    if (document.checkoutForm.email.value=="")
    {
        messages.push("Please fill in your email.");
    }
    if (document.checkoutForm.address.value=="")
    {
        messages.push("Please fill in your address.");
    }
    if (document.checkoutForm.country.value=="")
    {
        messages.push("Please choose a country.");
    }
    if (document.checkoutForm.state.value=="")
    {
        messages.push("Please choose a state.");
    }
    if (document.checkoutForm.zip.value=="")
    {
        messages.push("Please fill in your postcode number.");
    }
    if (messages.length > 0) {
        alert(messages.join('\n'));
        return false;
    } else {
        return true;
    }
}
  </script>
  <?php
  require_once("inc/footer.html");
?></html>
</body>