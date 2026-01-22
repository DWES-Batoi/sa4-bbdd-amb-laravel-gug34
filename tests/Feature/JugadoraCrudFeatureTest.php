<?php

namespace Tests\Feature;

use App\Models\Equip;
use App\Models\Jugadora;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class JugadoraCrudFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Gate::before(function () {
            return true; });
    }

    public function test_es_pot_llistar_jugadores()
    {
        $u = User::factory()->create();
        $this->actingAs($u);

        Jugadora::factory()->create(['nom' => 'Mapi León']);

        $resp = $this->get('/jugadoras');
        $resp->assertStatus(200);
        $resp->assertSee('Mapi León');
    }

    public function test_es_pot_crear_una_jugadora()
    {
        $u = User::factory()->create([
            'role' => 'administrador',
            'email_verified_at' => now(),
        ]);
        $this->actingAs($u);

        $equip = Equip::factory()->create();
        Storage::fake('public');

        $resp = $this->from(route('jugadoras.create'))
            ->post('/jugadoras', [
                'nom' => 'Salma Paralluelo',
                'equip_id' => $equip->id,
                'data_naixement' => '2003-11-13',
                'dorsal' => 7,
                'foto' => UploadedFile::fake()->image('foto.png'),
            ]);

        $resp->assertSessionHasNoErrors();
        $resp->assertRedirect(route('jugadoras.index'));

        $this->assertDatabaseHas('jugadoras', [
            'nom' => 'Salma Paralluelo',
            'dorsal' => 7,
        ]);
    }

    public function test_es_pot_actualitzar_una_jugadora()
    {
        $u = User::factory()->create(['role' => 'manager']);
        $this->actingAs($u);

        $equip = Equip::factory()->create();
        $jugadora = Jugadora::factory()->create([
            'nom' => 'Nom Inicial',
            'equip_id' => $equip->id
        ]);

        $resp = $this->from(route('jugadoras.edit', $jugadora))
            ->put("/jugadoras/{$jugadora->id}", [
                'nom' => 'Nom Editada',
                'equip_id' => $equip->id,
                'data_naixement' => '2000-01-01',
                'dorsal' => 10,
            ]);

        $resp->assertSessionHasNoErrors();
        $this->assertDatabaseHas('jugadoras', [
            'id' => $jugadora->id,
            'nom' => 'Nom Editada',
        ]);
    }

    public function test_es_pot_esborrar_una_jugadora()
    {
        $u = User::factory()->create(['role' => 'administrador']);
        $this->actingAs($u);

        $jugadora = Jugadora::factory()->create();

        $resp = $this->delete("/jugadoras/{$jugadora->id}");

        $resp->assertRedirect(route('jugadoras.index'));
        $this->assertDatabaseMissing('jugadoras', ['id' => $jugadora->id]);
    }
}