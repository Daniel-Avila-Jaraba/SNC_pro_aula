<?php
      $perfiles = [
            ["name" => "Perfil 1", "image" => "https://via.placeholder.com/150"],
            ["name" => "Perfil 2", "image" => "https://via.placeholder.com/150"],
            ["name" => "Perfil 3", "image" => "https://via.placeholder.com/150"],
            ["name" => "Perfil 4", "image" => "https://via.placeholder.com/150"],
            ["name" => "Perfil 5", "image" => "https://via.placeholder.com/150"]
           ];
            foreach ($perfiles as $perfil): ?>
            <div class="col-6 col-md-3 profile">
                <img src="<?= $perfil['image_url'] ?>" alt="<?= $perfil['name'] ?>" class="img-fluid rounded-circle">
                <p><?= $perfil['name'] ?></p>
            </div>
<?php endforeach; ?>
