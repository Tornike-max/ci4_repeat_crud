<?= $this->extend('layout/layout') ?>


<?= $this->section('content') ?>

<div class='nax-w-lg w-full flex justify-center items-center bg-slate-300 rounded-md'>
    <p><?= session()->get('error') ?></p>
</div>

<?= $this->endSection() ?>