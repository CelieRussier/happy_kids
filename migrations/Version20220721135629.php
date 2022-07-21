<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220721135629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rating_activity');
        $this->addSql('ALTER TABLE rating ADD activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D889262281C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_D889262281C06096 ON rating (activity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rating_activity (rating_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_F249BCAD81C06096 (activity_id), INDEX IDX_F249BCADA32EFC6 (rating_id), PRIMARY KEY(rating_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rating_activity ADD CONSTRAINT FK_F249BCAD81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rating_activity ADD CONSTRAINT FK_F249BCADA32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D889262281C06096');
        $this->addSql('DROP INDEX IDX_D889262281C06096 ON rating');
        $this->addSql('ALTER TABLE rating DROP activity_id');
    }
}
