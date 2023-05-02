<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class CaptchaController
{
    private $session;
    private $tokenGenerator;

    public function __construct(SessionInterface $session, TokenGeneratorInterface $tokenGenerator)
    {
        $this->session = $session;
        $this->tokenGenerator = $tokenGenerator;
    }

    public function captchaAction(Request $request)
    {
        $captcha = $this->generateCaptcha();
        $this->session->set('captcha', $captcha['code']);

        $response = new Response();
        $response->headers->set('Content-Type', 'image/png');
        $response->setContent($captcha['image']);

        return $response;
    }

    private function generateCaptcha()
    {
        $code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 5));

        $image = imagecreatetruecolor(120, 30);
        $bgColor = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 0, 0, 0);
        $font = __DIR__ . '/../fonts/arial.ttf';

        imagettftext($image, 20, 0, 10, 22, $textColor, $font, $code);
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();

        imagedestroy($image);

        return [
            'code' => $code,
            'image' => $imageData,
        ];
    }
}
