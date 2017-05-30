<?php if((sizeof($files) > 0) || (sizeof($directories) > 0)): ?>
<table class="table table-responsive table-condensed table-striped hidden-xs">
  <thead>
    <th style='width:50%;'><?php echo e(Lang::get('laravel-filemanager::lfm.title-item')); ?></th>
    <th><?php echo e(Lang::get('laravel-filemanager::lfm.title-size')); ?></th>
    <th><?php echo e(Lang::get('laravel-filemanager::lfm.title-type')); ?></th>
    <th><?php echo e(Lang::get('laravel-filemanager::lfm.title-modified')); ?></th>
    <th><?php echo e(Lang::get('laravel-filemanager::lfm.title-action')); ?></th>
  </thead>
  <tbody>
    <?php foreach($items as $item): ?>
    <tr>
      <td>
        <i class="fa <?php echo e($item->icon); ?>"></i>
        <a class="<?php echo e($item->is_file ? 'file' : 'folder'); ?>-item clickable" data-id="<?php echo e($item->is_file ? $item->url : $item->path); ?>">
          <?php echo e(str_limit($item->name, $limit = 20, $end = '...')); ?>

        </a>
      </td>
      <td><?php echo e($item->size); ?></td>
      <td><?php echo e($item->type); ?></td>
      <td><?php echo e($item->time); ?></td>
      <td>
        <?php if($item->is_file): ?>
        <a href="javascript:trash('<?php echo e($item->name); ?>')">
          <i class="fa fa-trash fa-fw"></i>
        </a>
        <?php if($item->thumb): ?>
        <a href="javascript:cropImage('<?php echo e($item->name); ?>')">
          <i class="fa fa-crop fa-fw"></i>
        </a>
        <a href="javascript:resizeImage('<?php echo e($item->name); ?>')">
          <i class="fa fa-arrows fa-fw"></i>
        </a>
        <?php endif; ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table class="table visible-xs">
  <tbody>
    <?php foreach($items as $item): ?>
    <tr>
      <td>
        <div class="media" style="height: 70px;">
          <div class="media-left">
            <div class="square <?php echo e($item->is_file ? 'file' : 'folder'); ?>-item clickable"  data-id="<?php echo e($item->is_file ? $item->url : $item->path); ?>">
              <?php if($item->thumb): ?>
              <img src="<?php echo e($item->thumb); ?>">
              <?php else: ?>
              <i class="fa <?php echo e($item->icon); ?> fa-5x"></i>
              <?php endif; ?>
            </div>
          </div>
          <div class="media-body" style="padding-top: 10px;">
            <div class="media-heading">
              <p>
                <a class="<?php echo e($item->is_file ? 'file' : 'folder'); ?>-item clickable" data-id="<?php echo e($item->is_file ? $item->url : $item->path); ?>">
                  <?php echo e(str_limit($item->name, $limit = 20, $end = '...')); ?>

                </a>
                &nbsp;&nbsp;
                <?php /* <a href="javascript:rename('<?php echo e($item->name); ?>')">
                  <i class="fa fa-edit"></i>
                </a> */ ?>
              </p>
            </div>
            <p style="color: #aaa;font-weight: 400"><?php echo e($item->time); ?></p>
          </div>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php else: ?>
<p><?php echo e(trans('laravel-filemanager::lfm.message-empty')); ?></p>
<?php endif; ?>
