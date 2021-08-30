<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210830093241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, posts_id INT DEFAULT NULL, comments LONGTEXT NOT NULL, INDEX IDX_5F9E962AD5E258C5 (posts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followers (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, users_followers_id INT DEFAULT NULL, INDEX IDX_8408FDA767B3B43D (users_id), INDEX IDX_8408FDA746FBBF9F (users_followers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hashtag (id INT AUTO_INCREMENT NOT NULL, hashtagpost_id INT DEFAULT NULL, hashtag VARCHAR(255) NOT NULL, INDEX IDX_5AB52A61BCE80A8F (hashtagpost_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hashtag_post (id INT AUTO_INCREMENT NOT NULL, posts_id INT DEFAULT NULL, INDEX IDX_EFB38414D5E258C5 (posts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, posts_id INT DEFAULT NULL, users_id INT DEFAULT NULL, comments_id INT DEFAULT NULL, INDEX IDX_AC6340B3D5E258C5 (posts_id), INDEX IDX_AC6340B367B3B43D (users_id), INDEX IDX_AC6340B363379586 (comments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, posts_id INT DEFAULT NULL, INDEX IDX_12D2AF81D5E258C5 (posts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notif_comments (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, INDEX IDX_F8050DE067B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, INDEX IDX_5A8A6C8D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saved_post (id INT AUTO_INCREMENT NOT NULL, posts_id INT DEFAULT NULL, users_id INT DEFAULT NULL, INDEX IDX_54B59E98D5E258C5 (posts_id), INDEX IDX_54B59E9867B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, INDEX IDX_A3C664D367B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, website VARCHAR(255) DEFAULT NULL, bio LONGTEXT DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AD5E258C5 FOREIGN KEY (posts_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE followers ADD CONSTRAINT FK_8408FDA767B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE followers ADD CONSTRAINT FK_8408FDA746FBBF9F FOREIGN KEY (users_followers_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE hashtag ADD CONSTRAINT FK_5AB52A61BCE80A8F FOREIGN KEY (hashtagpost_id) REFERENCES hashtag_post (id)');
        $this->addSql('ALTER TABLE hashtag_post ADD CONSTRAINT FK_EFB38414D5E258C5 FOREIGN KEY (posts_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3D5E258C5 FOREIGN KEY (posts_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B363379586 FOREIGN KEY (comments_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF81D5E258C5 FOREIGN KEY (posts_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE notif_comments ADD CONSTRAINT FK_F8050DE067B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE saved_post ADD CONSTRAINT FK_54B59E98D5E258C5 FOREIGN KEY (posts_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE saved_post ADD CONSTRAINT FK_54B59E9867B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D367B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B363379586');
        $this->addSql('ALTER TABLE hashtag DROP FOREIGN KEY FK_5AB52A61BCE80A8F');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AD5E258C5');
        $this->addSql('ALTER TABLE hashtag_post DROP FOREIGN KEY FK_EFB38414D5E258C5');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3D5E258C5');
        $this->addSql('ALTER TABLE medias DROP FOREIGN KEY FK_12D2AF81D5E258C5');
        $this->addSql('ALTER TABLE followers DROP FOREIGN KEY FK_8408FDA767B3B43D');
        $this->addSql('ALTER TABLE followers DROP FOREIGN KEY FK_8408FDA746FBBF9F');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B367B3B43D');
        $this->addSql('ALTER TABLE notif_comments DROP FOREIGN KEY FK_F8050DE067B3B43D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D67B3B43D');
        $this->addSql('ALTER TABLE saved_post DROP FOREIGN KEY FK_54B59E98D5E258C5');
        $this->addSql('ALTER TABLE saved_post DROP FOREIGN KEY FK_54B59E9867B3B43D');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D367B3B43D');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE followers');
        $this->addSql('DROP TABLE hashtag');
        $this->addSql('DROP TABLE hashtag_post');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE medias');
        $this->addSql('DROP TABLE notif_comments');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE saved_post');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE users');
    }
}
