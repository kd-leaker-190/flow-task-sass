<?php

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test Show',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertNoContent();
});
