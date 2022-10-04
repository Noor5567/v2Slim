  <?php
    class message
    {
        public function showmessage($type, $message)
        {
            return '<div class="alert alert-' . $type . ' alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
      <strong class="text-center">' . $message . '</strong>
  </div>';
        }
    }
    ?>
