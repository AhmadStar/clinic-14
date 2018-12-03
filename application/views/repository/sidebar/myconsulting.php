<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a href="#collapseMyMenu" data-parent="#accordion" data-toggle="collapse">
                <i class="fa fa-address-book icons" style="font-size:24px"></i>
                <?php trP('UserMenu')?>
            </a>
        </h4>
    </div>
<!--    <div class="panel-collapse collapse" id="collapseMyMyMenu">-->
    <div>
        <div class="panel-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <i class="material-icons materialsidebar md-48">person_add</i>
                            <?php echo anchor('consulting/userconsulting',tr('MyconsultingsList'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="material-icons materialsidebar md-48">person_add</i>
                            <?php echo anchor('expert_system',tr('ExpertSystem'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="material-icons materialsidebar md-48">person_add</i>
                            <?php echo anchor('article/userlist',tr('Articles'));?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
