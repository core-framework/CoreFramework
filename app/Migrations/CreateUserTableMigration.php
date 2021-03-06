<?php
/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This file is part of the Core Framework package.
 *
 * (c) Shalom Sam <shalom.s@coreframework.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\Migrations;


use Core\Database\Migration\AbstractMigration;

class CreateUserTableMigration extends AbstractMigration
{
    public function up()
    {
        $this->createDatabase('coreframework_db');
        $table = $this->table('user');
        $table->addColumn('id', 'integer', array('primaryKey' => true, 'autoIncrement' => true))
            ->addColumn('fname', 'string')
            ->addColumn('lname', 'string')
            ->addColumn('name', 'string')
            ->addColumn('userId', 'string')
            ->addColumn('email', 'string')
            ->addColumn('email_hash', 'string', array('null' => true))
            ->addColumn('pass_hash', 'string', array('size' => 255))
            ->addTimestamps()
            ->create();
    }

    public function down()
    {
        $this->dropTable('user');
    }
}