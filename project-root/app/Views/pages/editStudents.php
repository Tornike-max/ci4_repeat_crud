<?= $this->extend('layout/layout') ?>


<?= $this->section('content') ?>

<div class="w-full flex justify-center items-center">
    <div class="container mx-auto mt-10">
        <div class="w-full flex justify-start items-center">
            <a href="/students" class="py-2 px-3 rounded-md bg-blue-500 hover:bg-blue-600 text-slate-100 duration-150 transition-all">Go Back</a>
        </div>
        <div class="max-w-md mx-auto bg-white p-5 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-5">Edit Student</h1>
            <form method='post' action="/students/update/<?= $student['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="_method" value="PUT" />

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" value="<?= $student['name'] ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="text" name="email" value="<?= $student['email'] ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Subjcets:</label>
                    <select name="subject_id" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <?php foreach ($subjects as $subject) : ?>
                            <option value="<?= $subject['id'] ?>" <?= $student['subject_id'] === $subject['id'] ? 'selected' : '' ?>><?= $subject['subject_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Update" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 cursor-pointer" />
                </div>
            </form>
        </div>
    </div>

    <?= $this->endSection() ?>