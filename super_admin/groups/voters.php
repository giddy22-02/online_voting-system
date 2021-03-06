<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>Voters-Online Voting System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Gideon Kiplangat" />

    <!--  Description  -->
    <meta name="description" content="userinterface, voting system, voter," />
    <!-- Keywords  -->
    <meta name="keywords" content="form, container, header, footer">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--CSS link -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!--Table-->
    <div class="container-fluid my-3">
        <!-- Modal  For Adding New Voters-->
        <form action="actions/Add_voter.php" method="POST" enctype="multipart/form-data" lass="p-3">
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Voter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text" class="form-control w-80 m-auto" name="fullname"
                                    placeholder="Full Name" required="required">
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control w-80 m-auto" name="idno" placeholder="Id No"
                                    required="required" minlength="10" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control w-80 m-auto" name="email"
                                    placeholder="Email Address" required="required">
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control w-80 m-auto" name="phone" placeholder="Phone No"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control w-80 m-auto" name="photo">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control w-80 m-auto" name="password" placeholder="Password">
                            </div>
                             <div class="mb-3">
                                <input type="password" class="form-control w-80 m-auto" name="cpassword" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal For Editing Data -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Voter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control w-80 m-auto" name="fullname" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control w-80 m-auto" name="idno" required="required"
                                minlength="10" maxlength="10">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control w-80 m-auto" name="email" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control w-80 m-auto" name="phone" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control w-80 m-auto" name="photo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="card bg-info my-3 table-responsive">
            <div class="card-header fw-bold">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h3>Registered Voters</h3>
                    </div>
                    <div class="col-md-4 text-center">
                        <!--Notification Message upon submission-->
                        <?php
                              if(isset($_SESSION['status']))
                              {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                            </button>
                        </div>
                        <?php
                                unset($_SESSION['status']);
                            }?>
                        <!--Notification Message upon submission-->
                    </div>
                    <div class="col-md-4 text-center">
                        <!--Add New voters Button-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addnew">
                            <i class="bi bi-person-plus"></i> Add New
                        </button>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">ID NO</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
               require_once('partials/i_voters.php');
                ?>
                </tbody>
            </table>
        </div>

    </div>


    <!--Javascript Libraries-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>