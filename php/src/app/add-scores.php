<!DOCTYPE html>
<html class="no-js" lang="en">
  <head> 
    
    <?php include_once "components/head.php" ?>

    <title>Register - Mavle</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

    <style>
        .breadcrumbs-area {
        padding: 100px 0;
        background: #f6f6f6 url(img/farmland.jpeg) no-repeat scroll center
            center/cover;
        }
    </style>
  </head>

  <body>
    <div class="home-wrapper home-3">
        <?php include_once "components/header.php" ?>

            <div class="breadcrumbs-area position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="breadcrumb-content position-relative section-content">
                                <h3 class="title-3">Register</h3>
                                <ul>
                                    <li><a href="./">Home</a></li>
                                    <li>Register</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="login-register-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                        <div class="login-register-wrapper">
                            <div class="section-content text-center mb-5">
                                <h2 class="title-4 mb-2">Create Account</h2>
                                <p class="desc-content">Please Register using account detail bellow.</p>
                            </div>
                            <form id="registerForm" enctype="multipart/form-data" method="post">
                                <div class="single-input-item mb-1">
                                    <input required name="fullname" type="text" placeholder="Full Name">
                                </div>
                                <div class="single-input-item mb-1">
                                    <input required name="phone" type="text" placeholder="Phone number">
                                </div>
                                <div class="single-input-item mb-1">
                                    <input required name="email" type="email" placeholder="Email">
                                </div>
                                <div class="single-input-item mb-1">
                                    <input required name="password" type="password" placeholder="Enter your Password">
                                </div>


                                <div class="single-input-item mb-3">
                                    <small for="">User Type</small>
                                    <select id="role" class="form-control" required name="role" type="text">
                                        <option value="0">Farmer</option>
                                        <option value="1">Buyer</option>
                                    </select>
                                </div>

                                <div class="single-input-item mb-1">
                                    <input required name="location" type="text" placeholder="Your Location">
                                </div>

                                <div class="single-input-item mb-1">
                                    <input required name="quantity" type="number" placeholder="Quantity you buy/sell in KG">
                                </div>

                                <div class="single-input-item mb-1">
                                    <input required name="image" type="file"  accept="image/*" placeholder="Image">
                                </div>

                                <div class="row" id="result"></div>
                                <div class="single-input-item mb-1">
                                    <button class="btn bg-danger text-white px-3 py-1 btn-primary-color"> 
                                        <span class="spinner" id="spinner" style="display: none;">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        </span>
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "components/footer.php" ?>
    </div>
    

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
      <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <?php include_once "components/scripts.php" ?>

  </body>
</html>

<script>
    $('#registerForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/register.php',
            type: 'POST',
            data : new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
            $('#spinner').show();
            $('#result').hide();
            $('#btnText').hide();
            },
            success: function(data){
            
                
                $('#result').html(data);
                $('#result').fadeIn();
                $('#spinner').hide();
                $('#btnText').show();
                
                
                if (data.includes('success')) {
                    setTimeout(() => {
                        if ($('#role').val() == 1) {
                            location.href = 'farmers.php';
                        } else {
                            location.href = 'consumers.php';
                        }
                    }, 5000);
                }
            }
        })
    })
</script>