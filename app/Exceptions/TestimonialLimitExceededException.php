<?php

namespace App\Exceptions;

use Exception;

class TestimonialLimitExceededException extends Exception
{
    protected $message = "Mencapai batas maksimal testimonial yang ditampilkan, Silahkan ubah status testimonial!";
}
