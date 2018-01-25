<?php

/**
 * ���������� UserController
 */
class UserController
{
    /**
     * Action ��� �������� "�����������"
     */
    public function actionRegister()
    {
        // ���������� ��� �����
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        // ��������� �����
        if (isset($_POST['submit'])) {
            // ���� ����� ����������
            // �������� ������ �� �����
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // ���� ������
            $errors = false;

            // ��������� �����
            if (!User::checkName($name)) {
                $errors[] = '��� �� ������ ���� ������ 2-� ��������';
            }
            if (!User::checkEmail($email)) {
                $errors[] = '������������ email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = '������ �� ������ ���� ������ 6-�� ��������';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = '����� email ��� ������������';
            }

            if ($errors == false) {
                // ���� ������ ���
                // ������������ ������������
                $result = User::register($name, $email, $password);
            }
        }

        // ���������� ���
        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    /**
     * Action ��� �������� "���� �� ����"
     */
    public function actionLogin()
    {
        // ���������� ��� �����
        $email = false;
        $password = false;

        // ��������� �����
        if (isset($_POST['submit'])) {
            // ���� ����� ����������
            // �������� ������ �� �����
            $email = $_POST['email'];
            $password = $_POST['password'];

            // ���� ������
            $errors = false;

            // ��������� �����
            if (!User::checkEmail($email)) {
                $errors[] = '������������ email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = '������ �� ������ ���� ������ 6-�� ��������';
            }

            // ��������� ���������� �� ������������
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // ���� ������ ������������ - ���������� ������
                $errors[] = '������������ ������ ��� ����� �� ����';
            } else {
                // ���� ������ ����������, ���������� ������������ (������)
                User::auth($userId);

                // �������������� ������������ � �������� ����� - �������
                header("Location: /admin");
            }
        }

        // ���������� ���
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * ������� ������ � ������������ �� ������
     */
    public function actionLogout()
    {
        // �������� ������
       // session_start();

        // ������� ���������� � ������������ �� ������
        unset($_SESSION["user"]);

        // �������������� ������������ �� ������� ��������
        header("Location: /");




    return true;


    }



}