@extends("dashboard.layouts.dashboardMaster")
@section("content")
    <head>
        <title>ویرایش سرویس</title>
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
                <input id="title" value="<?= $service->title ?>" type="text" name="title"
                       placeholder="عنوان محصول">
            </div>

            <div>
                <input id="subtitle" type="text" name="subtitle"
                       placeholder="زیر عنوان محصول مثل بهترین رستوران گیلان"
                       value="<?= $service->etitle ?>"
                >
            </div>
            <div>
                        <textarea name="dis" id="" cols="30" rows="10"
                                  placeholder="توضیحات محصول"><?= $service->description?></textarea>
            </div>


            <div class="select">
                <select name="category">
                    <option style="display: none">دسته بندی محصول</option>
                    <?php

                    foreach ($categories as $category):

                    ?>

                    <option value="<?= $category->id ?>"
                            <?= $category->id === $service->cat_id ? 'selected' : ''?>  selected><?= $category->title ?></option>

                    <?php

                    endforeach;
                    ?>
                </select>

                <div>
                    <input id="address" type="text" name="address" value="<?= $service->address ?>" placeholder="آدرس محصول">
                </div>

            </div>
            <div>
                <input type="file" name="advertise_img" id="file"/>
                <div id="imageContiner">
                    <?php
                    if ($service->banner): ?>


                    <img src='<?= $service['banner'] ?>' width="200" height="auto" alt="<?= $service['title'] ?>"/>
                    <?php
                    else:
                    ?>
                    <img src="assets/dashboard/images/uploadPic.png" alt="اپلود تصویر">
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <button class="add_product_button" name="editService">ویرایش سرویس</button>
        </form>
    </div>
</div>

@endsection
