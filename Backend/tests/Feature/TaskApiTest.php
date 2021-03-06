<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    /**
     * test the api that get all tasks 
     * 
     * @return void
     */
    public function testGetAllTasks()
    {
        $response = $this->json('GET', '/api/tasks');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => true,
            ]);
    }

    /**
     * test the api that create new task
     *
     * @return void
     */
    public function testCreateTask()
    {
        $response = $this->json('POST', '/api/tasks', ['name' => 'insertedTest']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'data' => true,
            ]);
            
    }

    /**
     * test the api that delete specific task
     * 
     * @return void
     */
    public function testDestroyTask()
    {
        //the id must be exist in the database
        $response = $this->json('Delete', '/api/tasks/5b340396f88cef1f7b7dc632');

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'msg' => 'deleted successfully',
            ]);    
    }
}
