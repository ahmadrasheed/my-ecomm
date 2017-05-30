<ul class="list-unstyled">
  <?php foreach($root_folders as $root_folder): ?>
    <li>
      <a class="clickable folder-item" data-id="<?php echo e($root_folder->path); ?>">
        <i class="fa fa-folder"></i> <?php echo e($root_folder->name); ?>

      </a>
    </li>
    <?php foreach($root_folder->children as $directory): ?>
      <li style="margin-left: 10px;">
        <a class="clickable folder-item" data-id="<?php echo e($directory->path); ?>">
          <i class="fa fa-folder"></i> <?php echo e($directory->name); ?>

        </a>
      </li>
    <?php endforeach; ?>
    <?php if($root_folder->has_next): ?>
      <hr>
    <?php endif; ?>
  <?php endforeach; ?>
</ul>
