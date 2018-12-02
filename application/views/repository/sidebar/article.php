<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a href="#collapseArticles" data-parent="#accordion" data-toggle="collapse">
        <i class="fa fa-address-book icons" style="font-size:24px"></i> 
        <?php trP('Articles')?>
      </a>
    </h4>
  </div>
  <div class="panel-collapse collapse" id="collapseArticles">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <td>
              <i class="material-icons materialsidebar md-48">person_add</i> <?php echo anchor('article',tr('ArticlesList'));?>
            </td>
          </tr>
          <tr>
            <td>
              <i class="fa fa-edit materialsidebar" style="font-size: 20px"></i> <?php echo anchor('article/new_article/',tr('AddNewArticle'));?>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>