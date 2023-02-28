<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistance\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine -> getRepository(Student::class);
        $Student = $repo -> FindAll();
        var_dump($Student);
        die();
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
}
#[Route('/deleteStudent/{id}', name: 'Student_delete')]
public function deleteStudent($id,StudentRepository $repo, ManagerRegistry $doctrine)
{
    $Student = $repo->find($id);
    $entitymanager = $doctrine->getManager();
    $entitymanager->remove($Student);
    $entitymanager->flush();
    $this->redirectToRoute('app_student');

}
#[Route('/addStudent', name: 'Student_add')]
public function addStudent(StudentRepository $repo, ManagerRegistry $doctrine)
{
    $Student = new Student();
    $Student = setNSC(12);
    $Student->setEmail('3a19@esprit.tn');
    $entitymanager = $doctrine->getManager();
    $entitymanager->remove($Student);
    $entitymanager->flush();
    $repo->($student,true);
    return $this->redirectToRoute('app_student');

}
#[Route('/updateStudent/{id}', name: 'Student_update')]
public function updateStudent($id,StudentRepository $repo, ManagerRegistry $doctrine)
{
    $Student = $repo->find($id);
    $Student = setNSC('student updated');
    $entitymanager = $doctrine->getManager();
    $entitymanager->flush();
    return $this->redirectToRoute('app_student');

}
    #[Route('/student', name: 'app_student')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine -> getRepository(Student::class);
        $Student = $repo -> FindAll();
        var_dump($Student);
        die();
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }


