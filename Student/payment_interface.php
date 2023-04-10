<?php 
    require_once './includes/header.php';
?>
        <!-- Content -->
        <h3 class="text-center text-primary">Please select payment method</h3>
<div class="row" style="margin:auto;width:99%">
                  <div class="col-lg-4 col-md-6 px-5 py-5">
                      <div class="card">
                          <div class="card-body">
                              <div class="stat-widget-five">
                                  <div class="stat-icon dib flat-color-3">
                                      <i class="pe-7s-browser"></i>
                                  </div>
                                  <!-- attendance -->
                                <a href="payment_form.php">
                                  <div class="stat-content">
                                      <div class="text-left dib">
                                          <div class="stat-text"><span >Card</span></div>
                                          <div class="stat-heading">Pay Using Card Detail</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  </a>

                                  <!-- pay using bank detail -->
                      <div class="col-lg-4 col-md-6 px-5 py-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-table"></i>
                                    </div>
                                    <!-- time table -->
                                    <a href="pay_bank.php">
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span >Bank</span></div>
                                            <div class="stat-heading">Pay using bank detail</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                        
  </div>               
                              
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- Footer -->
      <?php
        require_once './includes/footer.php'
      ?>