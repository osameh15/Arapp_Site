@extends("dashboard.layouts.dashboardMaster")
@section("content")
    <head>
        <title>افزودن سرویس</title>
    </head>
    <div class="container">
        <div id="add_product_form">

            <div id="alerts">
                <?php
                if (isset($response['success'])) {


                ?>
                <div class="alert alert-success text-right" role="alert">
                    <?= $response['success']; ?>
                </div>
                <?php
                }

                ?>



                <?php
                if (isset($response['errors'])) {

                foreach ($response['errors'] as $error):


                ?>
                <div class="alert alert-danger text-right" role="alert">
                    <?= $error ?>
                </div>
                <?php

                endforeach;
                }

                ?>
            </div>


            <form action="" method="post" enctype="multipart/form-data" id="form">
                <div>
                    <input id="title" type="text" name="title" placeholder="عنوان محصول">
                </div>

                <div>
                    <input id="subtitle" type="text" name="subtitle"
                           placeholder="زیر عنوان محصول مثل بهترین رستوران گیلان">
                </div>
                <div>
                    <textarea name="dis" id="" cols="30" rows="10" placeholder="توضیحات محصول"></textarea>
                </div>

                <div>
                    <input id="address" type="text" name="address" placeholder="آدرس محصول">
                </div>


                <div class="select">
                    <select name="category">
                        <option style="display: none">دسته بندی محصول</option>
                        <?php

                        foreach ($categories as $category):

                        ?>

                        <option value="<?= $category->id ?>"><?= $category->title ?></option>

                        <?php

                        endforeach;
                        ?>
                    </select>
                </div>
                <div>
                    <input type="file" name="advertise_img" id="file"/>
                    <div id="imageContiner">
                        <img src="assets/dashboard/images/uploadPic.png" alt="اپلود تصویر">
                    </div>
                </div>
                <button class="add_product_button" name="add_advertise">افزودن محصول</button>
            </form>
        </div>
    </div>
@endsection
