@extends("dashboard.layouts.dashboardMaster")
@section("content")
    <head>
        <title>سرویس های من</title>
    </head>
    <div class="container">

        <div id="list">
            <div class="row">
                <?php
                foreach ($services as $service):
                ?>
                <div class="col-md-3 mt-2">
                    <div class="list_item">
                        <img src='<?= $service['banner'] ?>' alt="<?= $service['title'] ?>"/>
                        <h4 class="title text-right"><?= $service['title'] ?></h4>
                        <div class="actions">
                            <a href="/editService?service=<?= $service['slug']  ?>" style="text-decoration: none">
                                <i class="fa fa-edit editService"></i>
                            </a>
                            <i class="fa fa-trash delete"></i>
                            <form action="" method="post" id="deletedService">
                                <input type="hidden" name="deletedService" value="<?= $service['id'] ?>">
                            </form>
                        </div>
                    </div>

                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>

    @endsection

@section("js")
    <script>

        $(document).ready(function () {

            $(".delete").click(function () {
                $("#deletedService").submit();
                $(this).parents(".col-md-3").css("background", 'tamoato');
                $(this).parents('.col-md-3').fadeOut("slow");
            });
        });

    </script>

@endsection

