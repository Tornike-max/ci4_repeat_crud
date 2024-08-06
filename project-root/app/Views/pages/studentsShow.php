<?= $this->extend('layout/layout') ?>


<?= $this->section('content') ?>

<div class="container mx-auto mt-10">
    <div class="w-full flex justify-start items-center">
        <a href="/students" class="py-2 px-3 rounded-md bg-blue-500 hover:bg-blue-600 text-slate-100 duration-150 transition-all">Go Back</a>
    </div>
    <div class="max-w-md mx-auto bg-white p-5 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-5">Student Details</h1>
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <p class="mt-1 text-gray-900"><?= esc($student['name']) ?></p>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <p class="mt-1 text-gray-900"><?= esc($student['email']) ?></p>
        </div>
        <div class="mb-4">
            <label for="subject_id" class="block text-gray-700">Subject:</label>

            <p class="mt-1 text-gray-900"><?= esc($student['subject_name'] ?? 'Unknown') ?></p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>