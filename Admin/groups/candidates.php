<?php
include ('../../actions/connect.php');
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <!--Title-->
    <title>Candidates-Online Voting System</title>
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
    <div class="container-fluid">
        <!-- Modal  For Adding New Candidates-->
        <form action="actions/Add_cand.php" method="POST" enctype="multipart/form-data" lass="p-3">
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Candidate</h5>
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
                                <input type="number" class="form-control w-80 m-auto" name="idno" placeholder="ID No"
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
                                <select name="position" class="form-control w-80 m-auto">
                                    <option value="President">President</option>
                                    <option value="Secretary General">Secretary General</option>
                                    <option value="Treasurer">Treasurer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control w-80 m-auto" name="age" placeholder="Age"
                                    required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <div class="mb-3">
                                <input type="text" class="form-control w-80 m-auto" name="admin" value ="<?php echo  $_SESSION['username'];?>"
                                    required="required">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal For Editing Data -->
        <form action="" method="POST" enctype="multipart/form-data" lass="p-3">
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>

                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="update_id" id="update_id">
                            <div class="mb-3">
                                <input type="text" id="fullname" class="form-control w-80 m-auto" name="fullname"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <input type="number" id="idno" class="form-control w-80 m-auto" name="idno"
                                    required="required" minlength="10" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <input type="email" id="email" class="form-control w-80 m-auto" name="email"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <input type="tel" id="phone" class="form-control w-80 m-auto" name="phone"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <input type="file" id="photo" class="form-control w-80 m-auto" name="photo">
                            </div>
                            <div class="mb-3">
                                <select name="position" id="position" class="form-control w-80 m-auto">
                                    <option value="President">President</option>
                                    <option value="Secretary General">Secretary General</option>
                                    <option value="Treasurer">Treasurer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="number" id="age" class="form-control w-80 m-auto" name="age"
                                    required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="card bg-info my-3 table-responsive">
            <div class="card-header fw-bold">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h3>Registered candidates</h3>
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
                        <!--Add New Candidates Button-->
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
                        
                        <th scope="col">Full Name</th>
                        <th scope="col">Id No</th>
                        <th scope="col">Position</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
               require_once('partials/i_candidates.php');
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