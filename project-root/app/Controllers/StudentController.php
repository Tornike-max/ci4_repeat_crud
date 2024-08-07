<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Student;
use App\Models\Subject;
use CodeIgniter\HTTP\ResponseInterface;

class StudentController extends BaseController
{

    private $db;
    public function  __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $studentsObject = $this->db->table('students');
        $studentsObject->select('students.id,students.name,students.student_image,students.email,students.subject_id,subjects.subject_name,subjects.subject_duration');
        $studentsObject->join('subjects', 'subjects.id = students.subject_id');
        $students = $studentsObject->orderBy('id', 'desc')->get()->getResultArray();

        return view('pages/students', [
            'students' => $students
        ]);
    }

    public function show($id)
    {
        $studentObject = $this->db->table('students')
            ->select('students.id, students.name, students.email, students.subject_id, subjects.subject_name, subjects.subject_duration')
            ->join('subjects', 'subjects.id = students.subject_id')
            ->where('students.id', $id)
            ->get();

        $student = $studentObject->getRowArray();

        return view('pages/studentsShow', ['student' => $student]);
    }

    public function create()
    {
        $subjectsObject = $this->db->table('subjects');
        $subjectsObject->select();
        $subjects = $subjectsObject->get()->getResultArray();

        if (empty($subjects)) {
            return redirect('students/create');
        }
        return view('pages/createStudent', [
            'subjects' => $subjects
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'subject_id' => 'required',
            'student_image' => 'permit_empty|is_image[student_image]'
        ];

        if (!$this->validate($rules)) {
            $this->validator->getErrors();
            return redirect('students/create')->withInput();
        }

        $validatedData = $this->validator->getValidated();

        $file = $this->request->getFile('student_image');

        if (is_uploaded_file($file) && !empty($file)) {
            $name = $file->getName();
            $nameArr = explode('.', $name);
            $namePath = time() . '.' . end($nameArr);

            if ($file->move('images', $namePath)) {
                $validatedData['student_image'] = $namePath;
            }
        }

        $model = model(Student::class);

        $model->insert($validatedData);

        return redirect()->to('students')->with('success', 'Student Created Successfully');
    }

    public function edit($id)
    {
        $model = model(Student::class);
        $student = $model->find($id);
        $subjectModel = model(Subject::class);
        $subject = $subjectModel->where('id', $student['subject_id'])->findAll();
        $subjects = $subjectModel->findAll();

        $student['subject'] = $subject;
        return view('pages/editStudents', [
            'student' => $student,
            'subjects' => $subjects
        ]);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'valid_email',
            'subject_id' => 'required'
        ];

        if (!$this->validate($rules)) {
            $this->validator->getErrors();
            return redirect('students/edit/' . $id)->withInput();
        };

        $validatedData = $this->validator->getValidated();


        $model = model(Student::class);
        $model->update($id, $validatedData);
        return redirect('students')->with('success', 'Student updated successfully');
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect('students');
        }

        $model = model(Student::class);

        $model->delete($id);
        return redirect('students')->with('success', 'Student deleted successfully');
    }
}
