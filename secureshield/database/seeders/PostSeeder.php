<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * PostSeeder
 *
 * Seeds the posts table with sample blog posts about cybersecurity
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Post::create([
            'title' => '5 Consejos para Proteger tu Dispositivo de Malware',
            'slug' => '5-consejos-para-proteger-tu-dispositivo-de-malware',
            'content' => 'En la era digital actual, proteger tus dispositivos contra malware es crucial. Aquí te presentamos 5 consejos esenciales: 1) Mantén tu sistema operativo actualizado, 2) Usa contraseñas seguras, 3) Ten cuidado con los correos electrónicos sospechosos, 4) Instala un antivirus confiable como SecureShield, 5) Realiza copias de seguridad regularmente. La prevención es la mejor defensa contra las amenazas cibernéticas.',
            'author_id' => 1, // Admin
            'is_published' => true,
            'published_at' => now()->subDays(10),
        ]);

        Post::create([
            'title' => 'Qué es el Ransomware y Cómo Protegerte',
            'slug' => 'que-es-el-ransomware-y-como-protegerte',
            'content' => 'El ransomware es un tipo de malware que cifra tus archivos y exige un rescate para recuperarlos. Es una de las amenazas más peligrosas actualmente. Para protegerte: realiza copias de seguridad frecuentes, no abras archivos adjuntos sospechosos, mantén tu software actualizado y usa una solución antivirus robusta. SecureShield ofrece protección en tiempo real contra ransomware.',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now()->subDays(7),
        ]);

        Post::create([
            'title' => 'La Importancia de las Actualizaciones de Seguridad',
            'slug' => 'la-importancia-de-las-actualizaciones-de-seguridad',
            'content' => 'Las actualizaciones de seguridad son parches que corrigen vulnerabilidades en el software. Ignorarlas puede dejar tu sistema expuesto a ataques. Configura actualizaciones automáticas siempre que sea posible. SecureShield se actualiza constantemente para protegerte contra las últimas amenazas.',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now()->subDays(3),
        ]);

        Post::create([
            'title' => 'Phishing: Aprende a Identificar Correos Fraudulentos',
            'slug' => 'phishing-aprende-a-identificar-correos-fraudulentos',
            'content' => 'El phishing es una técnica que usan los ciberdelincuentes para robar información personal haciéndose pasar por entidades legítimas. Señales de alerta: errores ortográficos, enlaces sospechosos, solicitudes urgentes de información personal. Nunca compartas contraseñas por correo electrónico y verifica siempre la dirección del remitente.',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now()->subDay(),
        ]);

        Post::create([
            'title' => 'Novedades de SecureShield: Nueva Protección VPN',
            'slug' => 'novedades-de-secureshield-nueva-proteccion-vpn',
            'content' => 'Estamos emocionados de anunciar nuestra nueva función de VPN incluida en los planes Premium y Enterprise. Navega de forma segura y privada desde cualquier lugar. La VPN de SecureShield cifra tu conexión y oculta tu dirección IP, protegiendo tu privacidad en redes WiFi públicas.',
            'author_id' => 1,
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}
