<?php
class FinancialAttorneyTransactions {
    private $conn;
    private $table_name = "financial_attorney_transactions";

    public $id;
    public $code_pf;
    public $version;
    public $codeH;
    public $code;
    public $account;
    public $amount;
    public $date_now;
    public $vendor_name;
    public $effective_date;
    public $bene_ref;
    public $personal_id;
    public $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read transactions with pagination
    public function readPaginated($offset, $per_page) {
        $query = "SELECT * FROM " . $this->table_name . " LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $offset, PDO::PARAM_INT);
        $stmt->bindParam(2, $per_page, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    // Count total number of transactions
    public function count() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    

    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->code_pf = $row['code_pf'];
            $this->version = $row['version'];
            $this->codeH = $row['codeH'];
            $this->code = $row['code'];
            $this->account = $row['account'];
            $this->amount = $row['amount'];
            $this->date_now = $row['date_now'];
            $this->vendor_name = $row['vendor_name'];
            $this->effective_date = $row['effective_date'];
            $this->bene_ref = $row['bene_ref'];
            $this->personal_id = $row['personal_id'];
            $this->created = $row['created'];
        }
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . "
          SET
            code_pf=:code_pf, version=:version, codeH=:codeH, code=:code,
            account=:account, amount=:amount, date_now=:date_now,
            vendor_name=:vendor_name, effective_date=:effective_date,
            bene_ref=:bene_ref, personal_id=:personal_id";


        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->code_pf = htmlspecialchars(strip_tags($this->code_pf));
        $this->version = htmlspecialchars(strip_tags($this->version));
        $this->codeH = htmlspecialchars(strip_tags($this->codeH));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->account = htmlspecialchars(strip_tags($this->account));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->date_now = htmlspecialchars(strip_tags($this->date_now));
        $this->vendor_name = htmlspecialchars(strip_tags($this->vendor_name));
        $this->effective_date = htmlspecialchars(strip_tags($this->effective_date));
        $this->bene_ref = htmlspecialchars(strip_tags($this->bene_ref));
        $this->personal_id = htmlspecialchars(strip_tags($this->personal_id));

        // Bind values
        $stmt->bindParam(":code_pf", $this->code_pf);
        $stmt->bindParam(":version", $this->version);
        $stmt->bindParam(":codeH", $this->codeH);
        $stmt->bindParam(":code", $this->code);
        $stmt->bindParam(":account", $this->account);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":date_now", $this->date_now);
        $stmt->bindParam(":vendor_name", $this->vendor_name);
        $stmt->bindParam(":effective_date", $this->effective_date);
        $stmt->bindParam(":bene_ref", $this->bene_ref);
        $stmt->bindParam(":personal_id", $this->personal_id);

        // Execute query
        if ($stmt->execute()) {
            // สร้างเรื่องเพื่อเก็บค่า last inserted ID
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET
                    code_pf = :code_pf, version = :version, codeH = :codeH, code = :code,
                    account = :account, amount = :amount, date_now = :date_now,
                    vendor_name = :vendor_name, effective_date = :effective_date,
                    bene_ref = :bene_ref, personal_id = :personal_id
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->code_pf = htmlspecialchars(strip_tags($this->code_pf));
        $this->version = htmlspecialchars(strip_tags($this->version));
        $this->codeH = htmlspecialchars(strip_tags($this->codeH));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->account = htmlspecialchars(strip_tags($this->account));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->date_now = htmlspecialchars(strip_tags($this->date_now));
        $this->vendor_name = htmlspecialchars(strip_tags($this->vendor_name));
        $this->effective_date = htmlspecialchars(strip_tags($this->effective_date));
        $this->bene_ref = htmlspecialchars(strip_tags($this->bene_ref));
        $this->personal_id = htmlspecialchars(strip_tags($this->personal_id));

        // Bind values
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(":code_pf", $this->code_pf);
        $stmt->bindParam(":version", $this->version);
        $stmt->bindParam(":codeH", $this->codeH);
        $stmt->bindParam(":code", $this->code);
        $stmt->bindParam(":account", $this->account);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":date_now", $this->date_now);
        $stmt->bindParam(":vendor_name", $this->vendor_name);
        $stmt->bindParam(":effective_date", $this->effective_date);
        $stmt->bindParam(":bene_ref", $this->bene_ref);
        $stmt->bindParam(":personal_id", $this->personal_id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind id
        $stmt->bindParam(1, $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
