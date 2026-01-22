<?php

namespace Tests\Unit;

use App\Models\Jugadora;
use App\Models\Equip;
use App\Services\JugadoraService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;
use App\Repositories\BaseRepository;

class JugadoraServiceTest extends TestCase
{
    use WithFaker;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_guardar_crea_jugadora_i_puja_foto_si_cal()
    {
        Storage::fake('public');
        $repo = Mockery::mock(BaseRepository::class);

        $data = [
            'nom' => 'Alexia Putellas',
            'equip_id' => 1,
            'data_naixement' => '1994-02-04',
            'dorsal' => 11
        ];
        $foto = UploadedFile::fake()->image('foto.png');

        $repo->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function ($payload) {
                return isset($payload['foto']) && str_starts_with($payload['foto'], 'jugadoras/');
            }))
            ->andReturnUsing(function ($payload) use ($data) {
                return new Jugadora(array_merge($data, ['foto' => $payload['foto']]));
            });

        $service = new JugadoraService($repo);
        $jugadora = $service->guardar($data, $foto);

        Storage::disk('public')->assertExists($jugadora->foto);
    }

    public function test_eliminar_esborra_foto_si_existeix()
    {
        Storage::fake('public');
        $repo = Mockery::mock(BaseRepository::class);

        $jugadora = new Jugadora(['id' => 5, 'foto' => 'jugadoras/perfil.png']);
        Storage::disk('public')->put($jugadora->foto, 'dummy');

        $repo->shouldReceive('find')->once()->with(5)->andReturn($jugadora);
        $repo->shouldReceive('delete')->once()->with(5);

        $service = new JugadoraService($repo);
        $service->eliminar(5);

        Storage::disk('public')->assertMissing('jugadoras/perfil.png');
    }
}