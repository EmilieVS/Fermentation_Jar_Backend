<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_get_bio_or_default_is_empty()
    {
        $user = new User(['bio' => 'What\'s your fermentation style? Edit your profile and tell us in your bio!']);
        $this->assertEquals('What\'s your fermentation style? Edit your profile and tell us in your bio!', $user->getBioOrDefault());
    }
    public function test_get_bio_or_default_is_ok()
    {
        $user = new User(['bio' => 'I\' in love with the coco... pickles.']);
        $this->assertEquals('I\' in love with the coco... pickles.', $user->getBioOrDefault());
    }
}
