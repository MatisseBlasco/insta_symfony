<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210825093503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create database';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, id_like INT NOT NULL, id_posts INT NOT NULL, comments LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followers (id INT AUTO_INCREMENT NOT NULL, id_users INT NOT NULL, id_users_followers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hashtag (id INT AUTO_INCREMENT NOT NULL, hashtag VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hashtag_posts (id INT AUTO_INCREMENT NOT NULL, id_hashtag INT NOT NULL, id_posts INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, id_posts INT NOT NULL, id_users INT NOT NULL, id_comments INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, url_medias LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notif_comments (id INT AUTO_INCREMENT NOT NULL, id_comments INT NOT NULL, notif_comments VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, id_comments INT NOT NULL, id_medias INT NOT NULL, id_users INT NOT NULL, id_like INT NOT NULL, id_hashtag INT NOT NULL, description LONGTEXT DEFAULT NULL, post_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_posts (id INT AUTO_INCREMENT NOT NULL, id_posts INT NOT NULL, id_users INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, id_users INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, id_posts INT NOT NULL, id_notif_comments INT NOT NULL, id_subscription INT NOT NULL, id_saved_posts INT NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number NUMERIC(10, 0) NOT NULL, mail VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE followers');
        $this->addSql('DROP TABLE hashtag');
        $this->addSql('DROP TABLE hashtag_posts');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE medias');
        $this->addSql('DROP TABLE notif_comments');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE savec_posts');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE users');
    }
}
