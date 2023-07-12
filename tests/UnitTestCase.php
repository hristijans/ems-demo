<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class UnitTestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;
    use RefreshDatabase;
}
