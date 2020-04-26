<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php

//      $user = User::find_user_by_id(6);
//      $user->username = "asd";
//      $user->password = "asd";
//      $user->first_name = "asd";
//      $user->last_name = "asd";
//      $user->update();

//        $user = new User();
//        $user->username = "NEW USER";
//        $user->save();

//            $photos = Photo::find_all();
//            foreach ($photos as $photo)
//            {
//                echo $photo->title;
//                echo "<br>";
//            }
//            $photo = new Photo();
//            $photo->title = 'test title';
//            $photo->description = 'des test';
//            $photo->type = 'image.png';
//            $photo->size = '54';
//            $photo->create();

         //   echo INCLUDES_PATH;

            $user = Photo::find_by_id(1);
            echo $user->title;

               ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
